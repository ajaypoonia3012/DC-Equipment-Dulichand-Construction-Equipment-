<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'SEO & Marketing';
    protected static ?string $navigationLabel = 'Articles & Insights';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Blog Article')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Article Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Article Headline / Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('author')
                                    ->label('Author / Technical Contributor')
                                    ->default('Technical Engineering Team | DC Equipment')
                                    ->required(),

                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label('Publication Date')
                                    ->default(now()),

                                Forms\Components\Textarea::make('excerpt')
                                    ->label('Executive Summary / Excerpt')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required()
                                    ->helperText('Short preview displayed on blog index cards and search engine snippets.'),

                                Forms\Components\RichEditor::make('content')
                                    ->label('Full Article Body')
                                    ->required()
                                    ->columnSpanFull()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('blogs/inline'),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Media & Photos')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Featured Cover Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blogs')
                                    ->imageEditor()
                                    ->maxSize(10240)
                                    ->columnSpanFull()
                                    ->helperText('High-resolution article banner (1200x630 recommended for OpenGraph/Social sharing).'),

                                Forms\Components\FileUpload::make('gallery')
                                    ->label('Article Image Gallery')
                                    ->multiple()
                                    ->image()
                                    ->disk('public')
                                    ->directory('blogs/gallery')
                                    ->maxSize(10240)
                                    ->columnSpanFull(),

                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publish Immediately')
                                    ->default(true),
                            ]),

                        Forms\Components\Tabs\Tab::make('SEO & Ranking Optimization')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->placeholder('e.g. Concrete Pump Spare Parts in Rajasthan | Summer Maintenance Guide')
                                    ->maxLength(70)
                                    ->helperText('Recommended length: 50-60 characters.'),

                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->helperText('Recommended length: 150-160 characters.'),

                                Forms\Components\TextInput::make('meta_keywords')
                                    ->label('Target Keywords (Comma-separated)')
                                    ->placeholder('concrete pump spares jaipur, pce hyperplasticiser rajasthan, transit mixer drum repair'),
                            ]),
                    ])->columnSpanFull(),
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
                    ->defaultImageUrl('https://images.unsplash.com/photo-1541888946425-d0fbb18615f8?auto=format&fit=crop&w=200&q=80'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),

                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Date')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),
            ])
            ->actions([
                Tables\Actions\Action::make('publish_social')
                    ->label('Publish to Social')
                    ->icon('heroicon-o-share')
                    ->color('warning')
                    ->modalHeading('Cross-Post Article to Social Media')
                    ->modalDescription('Broadcast this article directly to Google Business Profile, Facebook, Instagram, and LinkedIn.')
                    ->modalSubmitActionLabel('Publish Now')
                    ->form([
                        Forms\Components\CheckboxList::make('channels')
                            ->label('Target Platforms')
                            ->options([
                                'gbp' => 'Google Business Profile (What\'s New Post)',
                                'facebook' => 'Facebook Company Page',
                                'instagram' => 'Instagram Business',
                                'linkedin' => 'LinkedIn Organization Page',
                            ])
                            ->default(['gbp', 'facebook', 'linkedin'])
                            ->required(),

                        Forms\Components\Textarea::make('message')
                            ->label('Post Caption / Message')
                            ->rows(4)
                            ->default(fn (Blog $record) => "📰 New Industry Insight from DC Equipment:\n\n\"{$record->title}\"\n\n{$record->excerpt}\n\nRead the full engineering guide on our website!\n#ConstructionEquipment #Jaipur #Rajasthan #ConcreteTechnology")
                            ->required(),

                        Forms\Components\Toggle::make('include_image')
                            ->label('Attach Featured Photo')
                            ->default(true),
                    ])
                    ->action(function (Blog $record, array $data) {
                        $publisher = app(\App\Services\SocialPublisherService::class);
                        $imageUrl = ($data['include_image'] && $record->image)
                            ? (str_starts_with($record->image, 'http') ? $record->image : asset('storage/' . $record->image))
                            : null;
                        $linkUrl = url('/blog/' . $record->slug);

                        $results = $publisher->publish($data['channels'], $data['message'], $imageUrl, $linkUrl);

                        \Filament\Notifications\Notification::make()
                            ->title('Article Dispatched to Social Platforms')
                            ->body('Successfully queued for: ' . implode(', ', array_map('strtoupper', $data['channels'])))
                            ->success()
                            ->send();
                    }),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
