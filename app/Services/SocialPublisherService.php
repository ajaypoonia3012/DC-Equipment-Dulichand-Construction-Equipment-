<?php

namespace App\Services;

use App\Models\CompanySetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SocialPublisherService
{
    /**
     * Publish a post payload across selected social media channels.
     *
     * @param array $channels ['gbp', 'facebook', 'instagram', 'linkedin']
     * @param string $message
     * @param string|null $imageUrl
     * @param string|null $linkUrl
     * @return array Status results per channel
     */
    public function publish(array $channels, string $message, ?string $imageUrl = null, ?string $linkUrl = null): array
    {
        $results = [];

        foreach ($channels as $channel) {
            $results[$channel] = match ($channel) {
                'facebook' => $this->postToFacebook($message, $imageUrl, $linkUrl),
                'instagram' => $this->postToInstagram($message, $imageUrl),
                'linkedin' => $this->postToLinkedIn($message, $imageUrl, $linkUrl),
                'gbp' => $this->postToGoogleBusinessProfile($message, $imageUrl, $linkUrl),
                default => ['success' => false, 'message' => "Unknown channel: {$channel}"],
            };
        }

        return $results;
    }

    protected function postToFacebook(string $message, ?string $imageUrl, ?string $linkUrl): array
    {
        $pageId = CompanySetting::get('facebook_page_id');
        $accessToken = CompanySetting::get('facebook_access_token');

        if (!$pageId || !$accessToken) {
            Log::info("SocialPublisher: Facebook simulation mode (no API credentials). Message: {$message}");
            return ['success' => true, 'message' => 'Simulated / Logged: Facebook Page credentials not configured.'];
        }

        try {
            $endpoint = "https://graph.facebook.com/v19.0/{$pageId}/feed";
            $payload = ['message' => $message, 'access_token' => $accessToken];
            if ($linkUrl) $payload['link'] = $linkUrl;

            $response = Http::post($endpoint, $payload);
            return [
                'success' => $response->successful(),
                'message' => $response->successful() ? 'Published to Facebook Page' : $response->body(),
            ];
        } catch (\Throwable $e) {
            Log::error("Facebook publish error: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    protected function postToInstagram(string $message, ?string $imageUrl): array
    {
        $accountId = CompanySetting::get('instagram_account_id');
        $accessToken = CompanySetting::get('instagram_access_token');

        if (!$accountId || !$accessToken) {
            Log::info("SocialPublisher: Instagram simulation mode (no API credentials). Message: {$message}");
            return ['success' => true, 'message' => 'Simulated / Logged: Instagram Graph credentials not configured.'];
        }

        try {
            if (!$imageUrl) {
                return ['success' => false, 'message' => 'Instagram posts require an image URL.'];
            }

            // Create container
            $containerRes = Http::post("https://graph.facebook.com/v19.0/{$accountId}/media", [
                'image_url' => $imageUrl,
                'caption' => $message,
                'access_token' => $accessToken,
            ]);

            if (!$containerRes->successful()) {
                return ['success' => false, 'message' => $containerRes->body()];
            }

            $creationId = $containerRes->json('id');
            // Publish container
            $publishRes = Http::post("https://graph.facebook.com/v19.0/{$accountId}/media_publish", [
                'creation_id' => $creationId,
                'access_token' => $accessToken,
            ]);

            return [
                'success' => $publishRes->successful(),
                'message' => $publishRes->successful() ? 'Published to Instagram' : $publishRes->body(),
            ];
        } catch (\Throwable $e) {
            Log::error("Instagram publish error: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    protected function postToLinkedIn(string $message, ?string $imageUrl, ?string $linkUrl): array
    {
        $authorUrn = CompanySetting::get('linkedin_organization_urn');
        $accessToken = CompanySetting::get('linkedin_access_token');

        if (!$authorUrn || !$accessToken) {
            Log::info("SocialPublisher: LinkedIn simulation mode (no API credentials). Message: {$message}");
            return ['success' => true, 'message' => 'Simulated / Logged: LinkedIn API credentials not configured.'];
        }

        try {
            $payload = [
                'author' => $authorUrn,
                'lifecycleState' => 'PUBLISHED',
                'specificContent' => [
                    'com.linkedin.ugc.ShareContent' => [
                        'shareCommentary' => ['text' => $message . ($linkUrl ? "\n\n" . $linkUrl : '')],
                        'shareMediaCategory' => 'NONE',
                    ],
                ],
                'visibility' => [
                    'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC',
                ],
            ];

            $response = Http::withToken($accessToken)
                ->withHeaders(['X-Restli-Protocol-Version' => '2.0.0'])
                ->post('https://api.linkedin.com/v2/ugcPosts', $payload);

            return [
                'success' => $response->successful(),
                'message' => $response->successful() ? 'Published to LinkedIn Page' : $response->body(),
            ];
        } catch (\Throwable $e) {
            Log::error("LinkedIn publish error: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    protected function postToGoogleBusinessProfile(string $message, ?string $imageUrl, ?string $linkUrl): array
    {
        $locationId = CompanySetting::get('gbp_location_id');
        $accessToken = CompanySetting::get('gbp_access_token');

        if (!$locationId || !$accessToken) {
            Log::info("SocialPublisher: Google Business Profile simulation mode. Message: {$message}");
            return ['success' => true, 'message' => 'Simulated / Logged: Google Business Profile credentials not configured.'];
        }

        try {
            $endpoint = "https://mybusiness.googleapis.com/v4/{$locationId}/localPosts";
            $payload = [
                'languageCode' => 'en-US',
                'summary' => $message,
                'topicType' => 'STANDARD',
            ];

            if ($linkUrl) {
                $payload['callToAction'] = [
                    'actionType' => 'LEARN_MORE',
                    'url' => $linkUrl,
                ];
            }

            if ($imageUrl) {
                $payload['media'] = [
                    ['mediaFormat' => 'PHOTO', 'sourceUrl' => $imageUrl],
                ];
            }

            $response = Http::withToken($accessToken)->post($endpoint, $payload);
            return [
                'success' => $response->successful(),
                'message' => $response->successful() ? 'Published to Google Business Profile' : $response->body(),
            ];
        } catch (\Throwable $e) {
            Log::error("GBP publish error: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
