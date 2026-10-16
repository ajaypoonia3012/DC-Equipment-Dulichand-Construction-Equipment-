<?php

namespace App\Filament\Resources\ClientReferenceResource\Pages;

use App\Filament\Resources\ClientReferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientReferences extends ListRecords
{
    protected static string $resource = ClientReferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
