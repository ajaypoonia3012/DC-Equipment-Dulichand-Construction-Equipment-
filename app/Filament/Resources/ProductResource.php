<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Catalog & Inventory';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('brand')
                                    ->label('Brand / Manufacturer')
                                    ->placeholder('e.g. DCP (Don Construction Products) or DC Equipment OEM'),

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU / Model Number')
                                    ->placeholder('DCE-BP-001'),

                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),

                                Forms\Components\Textarea::make('short_description')
                                    ->columnSpanFull()
                                    ->rows(2),

                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Technical Specs & Features')
                            ->schema([
                                Forms\Components\KeyValue::make('specifications')
                                    ->label('Technical Specifications')
                                    ->keyLabel('Parameter / Specification')
                                    ->valueLabel('Standard / Value')
                                    ->reorderable(),

                                Forms\Components\TagsInput::make('features')
                                    ->label('Key Features / Bullet Points')
                                    ->placeholder('Add a feature and press Enter'),

                                Forms\Components\Textarea::make('applications')
                                    ->label('Typical Applications')
                                    ->rows(3),
                            ]),

                        Forms\Components\Tabs\Tab::make('Media & Visibility')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Cover Photo / Featured Image')
                                    ->disk('public')
                                    ->directory('products')
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(10240)
                                    ->columnSpanFull()
                                    ->helperText('Upload JPG, PNG, or WebP (up to 10MB). Stored securely on public disk.'),

                                Forms\Components\FileUpload::make('gallery')
                                    ->label('Product Gallery Photos')
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('products/gallery')
                                    ->image()
                                    ->maxSize(10240)
                                    ->columnSpanFull()
                                    ->helperText('Upload multiple angle photos or site installation shots.'),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Feature on Homepage')
                                    ->default(false),

                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active in Catalog')
                                    ->default(true),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO & Regional Optimization')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('SEO Title')
                                    ->placeholder('e.g. Batching Plant Twin Shaft Wear Blades Jaipur | DC Equipment'),

                                Forms\Components\Textarea::make('meta_description')
                                    ->label('SEO Description')
                                    ->rows(2),

                                Forms\Components\TextInput::make('meta_keywords')
                                    ->label('Keywords (Comma-separated)')
                                    ->placeholder('wear plates jaipur, batching plant spares ajmer road'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl('https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=200&q=80'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn (Product $record) => $record->brand),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->badge()
                    ->color(fn (Product $record) => $record->category?->type === 'chemicals' ? 'success' : 'primary'),

                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_featured'),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\Action::make('publish_social')
                    ->label('Post to Social')
                    ->icon('heroicon-o-share')
                    ->color('warning')
                    ->modalHeading('Cross-Post Product to Social Platforms')
                    ->modalDescription('Broadcast this product announcement to Google Business Profile, Facebook, Instagram, and LinkedIn.')
                    ->modalSubmitActionLabel('Publish Now')
                    ->form([
                        Forms\Components\CheckboxList::make('channels')
                            ->label('Target Platforms')
                            ->options([
                                'gbp' => 'Google Business Profile (Local Post)',
                                'facebook' => 'Facebook Company Page',
                                'instagram' => 'Instagram Business (Image Required)',
                                'linkedin' => 'LinkedIn Organization Page',
                            ])
                            ->default(['gbp', 'facebook', 'linkedin'])
                            ->required(),

                        Forms\Components\Textarea::make('message')
                            ->label('Post Caption / Message')
                            ->rows(4)
                            ->default(fn (Product $record) => "⚡ DC Equipment Product Update:\n\n{$record->name} is in ready stock at our Jaipur warehouse! High durability, OEM-grade construction machinery spares & solutions across Rajasthan.\n\n📍 Visit DC Equipment, Ajmer Road, Jaipur | Call +91 86969 62600")
                            ->required(),

                        Forms\Components\Toggle::make('include_image')
                            ->label('Attach Featured Photo')
                            ->default(true),
                    ])
                    ->action(function (Product $record, array $data) {
                        $publisher = app(\App\Services\SocialPublisherService::class);
                        $imageUrl = ($data['include_image'] && $record->image) 
                            ? (str_starts_with($record->image, 'http') ? $record->image : asset('storage/' . $record->image))
                            : null;
                        $linkUrl = url('/products/' . $record->slug);

                        $results = $publisher->publish($data['channels'], $data['message'], $imageUrl, $linkUrl);

                        \Filament\Notifications\Notification::make()
                            ->title('Social Media Dispatch Completed')
                            ->body('Post submitted to ' . implode(', ', array_map('strtoupper', $data['channels'])))
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
