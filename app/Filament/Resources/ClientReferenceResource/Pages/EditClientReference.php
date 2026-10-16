<?php

namespace App\Filament\Resources\ClientReferenceResource\Pages;

use App\Filament\Resources\ClientReferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientReference extends EditRecord
{
    protected static string $resource = ClientReferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
