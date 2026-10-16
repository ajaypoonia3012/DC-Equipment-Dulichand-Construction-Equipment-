<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEnquiriesWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enquiry::query()->latest()->limit(5)
            )
            ->heading('Recent Quote Inquiries & Leads')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Contact Person')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company / Organization')
                    ->placeholder('Individual / Site'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone / WhatsApp')
                    ->icon('heroicon-m-phone'),

                Tables\Columns\TextColumn::make('inquiry_type')
                    ->label('Division')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'equipment' => 'primary',
                        'chemicals' => 'success',
                        'repair_service' => 'warning',
                        'rental' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'warning',
                        'contacted' => 'info',
                        'quotation_sent' => 'primary',
                        'closed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('view_details')
                    ->label('View')
                    ->icon('heroicon-m-eye')
                    ->modalHeading(fn (Enquiry $record): string => "Enquiry from {$record->name} ({$record->company_name})")
                    ->modalContent(fn (Enquiry $record) => view('filament.widgets.enquiry-detail-modal', ['record' => $record])),
            ]);
    }
}
