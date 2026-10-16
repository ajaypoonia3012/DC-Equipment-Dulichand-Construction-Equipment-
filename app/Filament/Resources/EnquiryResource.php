<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Models\Enquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationGroup = 'Leads & Inquiries';
    protected static ?string $navigationLabel = 'Quotes & Leads';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 'new')->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Client & Inquiry Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->readOnly(),

                        Forms\Components\TextInput::make('company_name')
                            ->readOnly(),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->readOnly(),

                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->readOnly(),

                        Forms\Components\TextInput::make('location')
                            ->label('Location / City')
                            ->readOnly(),

                        Forms\Components\TextInput::make('inquiry_type')
                            ->label('Department')
                            ->readOnly(),

                        Forms\Components\TextInput::make('product_or_service_interest')
                            ->label('Product / Service Required')
                            ->columnSpanFull()
                            ->readOnly(),

                        Forms\Components\Textarea::make('message')
                            ->label('Detailed Requirement')
                            ->columnSpanFull()
                            ->rows(4)
                            ->readOnly(),
                    ])->columns(2),

                Forms\Components\Section::make('Lead Processing & Admin Status')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'new' => 'New / Unreviewed',
                                'contacted' => 'Contacted / Meeting Arranged',
                                'quotation_sent' => 'Quotation / Proposal Sent',
                                'closed' => 'Order Closed / Converted',
                                'rejected' => 'Unqualified / Closed',
                            ])
                            ->default('new'),

                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Internal Admin Notes / Quotation Ref')
                            ->rows(3)
                            ->placeholder('Record dispatch details, agreed pricing, or next follow-up dates...'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('company_name')
                    ->searchable()
                    ->placeholder('N/A'),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->icon('heroicon-m-phone'),

                Tables\Columns\TextColumn::make('inquiry_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'equipment' => 'primary',
                        'chemicals' => 'success',
                        'repair_service' => 'warning',
                        'rental' => 'info',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status')
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quotation_sent' => 'Quotation Sent',
                        'closed' => 'Closed',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Filters\SelectFilter::make('inquiry_type')
                    ->options([
                        'equipment' => 'Equipment Spares',
                        'chemicals' => 'DCP Chemicals',
                        'repair_service' => 'Repair & Inspection',
                        'rental' => 'Equipment Rental',
                        'general' => 'General Inquiry',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Process Lead'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnquiries::route('/'),
            'edit' => Pages\EditEnquiry::route('/{record}/edit'),
        ];
    }
}
