<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoMetaResource\Pages;
use App\Models\SeoMeta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SeoMetaResource extends Resource
{
    protected static ?string $model = SeoMeta::class;
    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationGroup = 'Settings & SEO';
    protected static ?string $navigationLabel = 'SEO Meta Tags';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page & Search Engine Metadata')
                    ->schema([
                        Forms\Components\TextInput::make('page_name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('page_slug')
                            ->label('Page Identifier (Slug)')
                            ->required()
                            ->readOnly(),

                        Forms\Components\TextInput::make('title')
                            ->label('Meta Title (Appears in Google Search & Browser Tab)')
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Include brand and target location (e.g. Jaipur, Rajasthan)'),

                        Forms\Components\Textarea::make('description')
                            ->label('Meta Description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Recommended: 140 - 160 characters'),

                        Forms\Components\Textarea::make('keywords')
                            ->label('Target Keywords (Comma-separated)')
                            ->rows(2)
                            ->columnSpanFull()
                            ->helperText('e.g. construction equipment spares jaipur, dcp construction chemicals rajasthan'),

                        Forms\Components\TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Open Graph (Social Sharing)')
                    ->schema([
                        Forms\Components\TextInput::make('og_title')
                            ->label('Social Share Title'),

                        Forms\Components\Textarea::make('og_description')
                            ->label('Social Share Description')
                            ->rows(2),

                        Forms\Components\TextInput::make('og_image')
                            ->label('OG Image URL')
                            ->placeholder('/images/og-banner.jpg'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_name')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('page_slug')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeoMetas::route('/'),
            'edit' => Pages\EditSeoMeta::route('/{record}/edit'),
        ];
    }
}
