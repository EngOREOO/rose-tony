<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;
use App\Filament\Resources\BlogsResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'المدونة والمقالات';
    protected static ?string $navigationGroup = 'المدونة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('header_image')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->dehydrated(),
                Forms\Components\Select::make('blog_category_id')
                    ->relationship('category', 'name')
                    ->label('القسم')
                    ->required()
                    ->dehydrated(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->dehydrated(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->dehydrated(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->dehydrated(),
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255)
                    ->dehydrated(),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255)
                    ->helperText('Will be automatically generated from title if left empty')
                    ->dehydrated(),
                Forms\Components\TagsInput::make('tags')
                    ->separator(',')
                    ->splitKeys(['Tab', 'Enter', ','])
                    ->placeholder('Enter tags...')
                    ->helperText('Press Enter, Tab or comma to add a tag')
                    ->dehydrated(),
                Forms\Components\Toggle::make('is_featured')
                    ->default(false)
                    ->dehydrated(),
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->dehydrated(),
                
                    Section::make('SEO Settings')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->placeholder('Enter custom meta title (optional)')
                            ->helperText('Will automatically use blog title if left empty')
                            ->maxLength(60)
                            ->dehydrated(),
                
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->placeholder('Enter custom meta description (optional)')
                            ->helperText('Will automatically use first 160 characters of content if left empty')
                            ->maxLength(160)
                            ->rows(3)
                            ->dehydrated(),
                
                        Forms\Components\TagsInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->placeholder('Enter custom keywords (optional)')
                            ->helperText('Will automatically use blog tags if left empty')
                            ->separator(',')
                            ->splitKeys(['Tab', 'Enter', ','])
                            ->dehydrateStateUsing(fn ($state) => $state ?? [])
                            ->dehydrated(),
                
                        Select::make('robots')
                            ->label('Robots Meta Tag')
                            ->options([
                                'index, follow' => 'Index and Follow (default)',
                                'noindex, follow' => 'No Index, Follow',
                                'index, nofollow' => 'Index, No Follow',
                                'noindex, nofollow' => 'No Index, No Follow'
                            ])
                            ->default('index, follow')
                            ->dehydrated(),
                
                        Hidden::make('og_locale')
                            ->default('ar_AR')
                            ->dehydrated(),
                
                        Hidden::make('og_type')
                            ->default('article')
                            ->dehydrated(),
                    ])
                    ->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('القسم')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }
}
