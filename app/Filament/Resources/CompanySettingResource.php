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
                            ->readOnly(fn (?CompanySetting $record) => $record !== null),

                        Forms\Components\Select::make('group')
                            ->options([
                                'branding' => 'Branding (Logo, Favicon & Identity)',
                                'analytics' => 'Analytics & Tracking (GA4)',
                                'social_api' => 'Social Media API Credentials (GBP, FB, IG, LinkedIn)',
                                'general' => 'General Company Info',
                                'contact' => 'Contact & Address (Jaipur HQ)',
                                'stats' => 'Operational Milestones & Metrics',
                            ])
                            ->required(),

                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Single Line Text',
                                'textarea' => 'Multi-line Text / Token',
                                'image' => 'Image / File Upload',
                                'email' => 'Email Address',
                                'phone' => 'Phone Number',
                            ])
                            ->required()
                            ->live(),

                        // File Upload for image settings
                        Forms\Components\FileUpload::make('value')
                            ->label('Upload File / Image Asset')
                            ->disk('public')
                            ->directory('branding')
                            ->image()
                            ->maxSize(5120)
                            ->columnSpanFull()
                            ->visible(fn (Forms\Get $get, ?CompanySetting $record) => 
                                $get('type') === 'image' || 
                                in_array($get('key'), ['site_logo_light', 'site_logo_dark', 'site_favicon']) ||
                                ($record && ($record->type === 'image' || in_array($record->key, ['site_logo_light', 'site_logo_dark', 'site_favicon'])))
                            )
                            ->helperText('Uploaded files are stored under storage/app/public/branding/ and publicly accessible.'),

                        // Textarea for multi-line or token settings
                        Forms\Components\Textarea::make('value')
                            ->label('Setting Value / Key / Token')
                            ->rows(4)
                            ->columnSpanFull()
                            ->visible(fn (Forms\Get $get, ?CompanySetting $record) => 
                                $get('type') === 'textarea' ||
                                (str_contains((string)$get('key'), 'token') || str_contains((string)$get('key'), 'embed')) ||
                                ($record && ($record->type === 'textarea' || str_contains((string)$record->key, 'token') || str_contains((string)$record->key, 'embed')))
                            ),

                        // Standard text input
                        Forms\Components\TextInput::make('value')
                            ->label('Setting Value')
                            ->columnSpanFull()
                            ->visible(fn (Forms\Get $get, ?CompanySetting $record) => 
                                !in_array($get('type'), ['image', 'textarea']) &&
                                !in_array($get('key'), ['site_logo_light', 'site_logo_dark', 'site_favicon']) &&
                                !str_contains((string)$get('key'), 'token') &&
                                !str_contains((string)$get('key'), 'embed') &&
                                (!$record || (!in_array($record->type, ['image', 'textarea']) && !in_array($record->key, ['site_logo_light', 'site_logo_dark', 'site_favicon']) && !str_contains((string)$record->key, 'token') && !str_contains((string)$record->key, 'embed')))
                            ),
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

                Tables\Columns\TextColumn::make('key')
                    ->fontFamily('mono')
                    ->size('xs')
                    ->searchable(),

                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'branding' => 'danger',
                        'analytics' => 'info',
                        'social_api' => 'warning',
                        'general' => 'primary',
                        'contact' => 'success',
                        'stats' => 'secondary',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'branding' => 'Branding (Logo, Favicon)',
                        'analytics' => 'Analytics (GA4)',
                        'social_api' => 'Social APIs',
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
