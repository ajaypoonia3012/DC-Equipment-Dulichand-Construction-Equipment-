<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'Operations & Projects';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('icon')
                            ->label('Heroicon Identifier')
                            ->placeholder('wrench-screwdriver, cog-6-tooth, truck'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Textarea::make('short_description')
                            ->columnSpanFull()
                            ->rows(3)
                            ->required(),

                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('features')
                            ->label('Scope of Work / Key Procedures')
                            ->placeholder('Add procedure and press Enter'),

                        Forms\Components\TagsInput::make('benefits')
                            ->label('Client Benefits & Value Add')
                            ->placeholder('Add benefit and press Enter'),

                        Forms\Components\FileUpload::make('image')
                            ->label('Service Featured Image / Banner')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->imageEditor()
                            ->maxSize(10240)
                            ->columnSpanFull()
                            ->helperText('Upload service banner (maintenance workshop, technician at site, etc.).'),

                        Forms\Components\FileUpload::make('gallery')
                            ->label('Service Gallery / Field Photos')
                            ->multiple()
                            ->image()
                            ->disk('public')
                            ->directory('services/gallery')
                            ->maxSize(10240)
                            ->columnSpanFull()
                            ->helperText('Upload additional project / procedure snapshots.'),

                        Forms\Components\Toggle::make('is_featured')
                            ->default(true),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Cover')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl('https://images.unsplash.com/photo-1581092162384-8987c1d64718?auto=format&fit=crop&w=200&q=80'),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured'),
                Tables\Filters\TernaryFilter::make('is_active'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
