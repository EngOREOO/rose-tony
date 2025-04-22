<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use App\Models\Category; // Import Category Model
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationLabel = 'اراء العملاء';
    // protected static ?string $navigationLabel = 'الاقسام';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Testimonial Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required()
                            ->reactive(),
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->required(),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('testimonial_images')
                            ->collection('testimonial_images')
                            ->multiple()
                            ->maxFiles(10)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                            ->columnSpanFull()
                            ->visible(fn (callable $get) => $get('type') === 'image'),

                        SpatieMediaLibraryFileUpload::make('testimonial_videos')
                            ->collection('testimonial_videos')
                            ->multiple()
                            ->maxFiles(5)
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                            ->columnSpanFull()
                            ->visible(fn (callable $get) => $get('type') === 'video'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection(fn (Testimonial $record): string => 
                        $record->type === 'image' ? 'testimonial_images' : 'testimonial_videos'),
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
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->options(Category::pluck('name', 'id')->toArray()),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
