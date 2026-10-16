<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientReferenceResource\Pages;
use App\Models\ClientReference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientReferenceResource extends Resource
{
    protected static ?string $model = ClientReference::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Operations & Projects';
    protected static ?string $navigationLabel = 'Clients & Projects';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Client & Project Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Project Title / Assignment')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. MEIL - Rajasthan Water Grid & Lift Irrigation Projects'),

                        Forms\Components\TextInput::make('client_name')
                            ->label('Client Enterprise Name')
                            ->required()
                            ->placeholder('MEIL, JK Lakshmi Cement, KEC International'),

                        Forms\Components\TextInput::make('sector')
                            ->label('Industry / Sector')
                            ->placeholder('Infrastructure, Cement, Metro, Highways'),

                        Forms\Components\TextInput::make('location')
                            ->label('Project Location')
                            ->placeholder('Jaipur / Sirohi / Kota, Rajasthan'),

                        Forms\Components\TextInput::make('scope_supplied')
                            ->label('Scope / Materials Supplied')
                            ->columnSpanFull()
                            ->placeholder('Concrete pump wear parts, PCE hyperplasticisers, non-shrink grouts'),

                        Forms\Components\Textarea::make('testimonial')
                            ->label('Client Feedback / Endorsement')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('testimonial_author')
                            ->label('Testimonial Authority / Designation')
                            ->placeholder('Project Director / Plant In-Charge'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_featured')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('sector')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('location')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListClientReferences::route('/'),
            'create' => Pages\CreateClientReference::route('/create'),
            'edit' => Pages\EditClientReference::route('/{record}/edit'),
        ];
    }
}
