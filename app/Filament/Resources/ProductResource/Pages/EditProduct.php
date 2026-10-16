<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('publish_social')
                ->label('Publish to Social Media')
                ->icon('heroicon-o-share')
                ->color('warning')
                ->modalHeading('Cross-Post Product to Social Platforms')
                ->modalDescription('Broadcast this product announcement to Google Business Profile, Facebook, Instagram, and LinkedIn.')
                ->modalSubmitActionLabel('Publish Now')
                ->form([
                    \Filament\Forms\Components\CheckboxList::make('channels')
                        ->label('Target Platforms')
                        ->options([
                            'gbp' => 'Google Business Profile (Local Post)',
                            'facebook' => 'Facebook Company Page',
                            'instagram' => 'Instagram Business',
                            'linkedin' => 'LinkedIn Organization Page',
                        ])
                        ->default(['gbp', 'facebook', 'linkedin'])
                        ->required(),

                    \Filament\Forms\Components\Textarea::make('message')
                        ->label('Post Caption')
                        ->rows(4)
                        ->default(fn ($record) => "⚡ DC Equipment Product Update:\n\n{$record->name} is in ready stock at our Jaipur warehouse! High durability, OEM-grade construction machinery spares & solutions across Rajasthan.\n\n📍 Visit DC Equipment, Ajmer Road, Jaipur | Call +91 86969 62600")
                        ->required(),

                    \Filament\Forms\Components\Toggle::make('include_image')
                        ->label('Attach Featured Photo')
                        ->default(true),
                ])
                ->action(function ($record, array $data) {
                    $publisher = app(\App\Services\SocialPublisherService::class);
                    $imageUrl = ($data['include_image'] && $record->image)
                        ? (str_starts_with($record->image, 'http') ? $record->image : asset('storage/' . $record->image))
                        : null;
                    $linkUrl = url('/products/' . $record->slug);

                    $results = $publisher->publish($data['channels'], $data['message'], $imageUrl, $linkUrl);

                    \Filament\Notifications\Notification::make()
                        ->title('Product Dispatched to Social Platforms')
                        ->body('Successfully queued for: ' . implode(', ', array_map('strtoupper', $data['channels'])))
                        ->success()
                        ->send();
                }),

            Actions\DeleteAction::make(),
        ];
    }
}
