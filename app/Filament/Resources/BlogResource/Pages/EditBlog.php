<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Models\Blog;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('publish_social')
                ->label('Publish to Social Media')
                ->icon('heroicon-o-share')
                ->color('warning')
                ->modalHeading('Cross-Post Article to Social Channels')
                ->modalDescription('Broadcast this blog post to Google Business Profile, Facebook, Instagram, and LinkedIn.')
                ->modalSubmitActionLabel('Publish Now')
                ->form([
                    Forms\Components\CheckboxList::make('channels')
                        ->label('Target Platforms')
                        ->options([
                            'gbp' => 'Google Business Profile (Local Post)',
                            'facebook' => 'Facebook Company Page',
                            'instagram' => 'Instagram Business',
                            'linkedin' => 'LinkedIn Organization Page',
                        ])
                        ->default(['gbp', 'facebook', 'linkedin'])
                        ->required(),

                    Forms\Components\Textarea::make('message')
                        ->label('Post Caption')
                        ->rows(4)
                        ->default(fn (Blog $record) => "📰 New Industry Insight from DC Equipment:\n\n\"{$record->title}\"\n\n{$record->excerpt}\n\nRead the full engineering guide on our website!\n#ConstructionEquipment #Jaipur #Rajasthan #ConcreteTechnology")
                        ->required(),

                    Forms\Components\Toggle::make('include_image')
                        ->label('Attach Featured Photo')
                        ->default(true),
                ])
                ->action(function (Blog $record, array $data) {
                    $publisher = app(\App\Services\SocialPublisherService::class);
                    $imageUrl = ($data['include_image'] && $record->image)
                        ? (str_starts_with($record->image, 'http') ? $record->image : asset('storage/' . $record->image))
                        : null;
                    $linkUrl = url('/blog/' . $record->slug);

                    $results = $publisher->publish($data['channels'], $data['message'], $imageUrl, $linkUrl);

                    Notification::make()
                        ->title('Article Dispatched to Social Platforms')
                        ->body('Successfully queued for: ' . implode(', ', array_map('strtoupper', $data['channels'])))
                        ->success()
                        ->send();
                }),

            Actions\DeleteAction::make(),
        ];
    }
}
