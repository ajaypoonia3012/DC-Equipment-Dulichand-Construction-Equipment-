<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanySettingResource\Pages;
use App\Models\CompanySetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CompanySettingResource extends Resource
{
    protected static ?string $model = CompanySetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings & SEO';
    protected static ?string $navigationLabel = 'Company Profile & Info';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Setting Configuration')
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->readOnly(),

                        Forms\Components\Select::make('group')
                            ->options([
                                'general' => 'General Company Info',
                                'contact' => 'Contact & Address (Jaipur HQ)',
                                'stats' => 'Operational Milestones & Metrics',
                            ])
                            ->required(),

                        Forms\Components\Textarea::make('value')
                            ->label('Value / Setting Data')
                            ->rows(4)
                            ->columnSpanFull()
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->weight('bold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'primary',
                        'contact' => 'success',
                        'stats' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('value')
                    ->limit(60)
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => 'General Info',
                        'contact' => 'Contact Info',
                        'stats' => 'Statistics',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanySettings::route('/'),
            'edit' => Pages\EditCompanySetting::route('/{record}/edit'),
        ];
    }
}
