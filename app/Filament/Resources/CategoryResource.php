<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
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
    protected static ?string $navigationLabel = 'آراء العملاء';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الرأي')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('العنوان')
                            ->maxLength(255),

                        Forms\Components\Select::make('type')
                            ->label('نوع الوسائط')
                            ->options([
                                'image' => 'صورة',
                                'video' => 'فيديو',
                            ])
                            ->default('image')
                            ->reactive(),
                    ]),

                Forms\Components\Section::make('الوسائط')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('main_testimonial_image')
                            ->label('صور الرأي')
                            ->collection('main_testimonial_image')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('testimonial_images')
                            ->label('الصوره الرئيسية (متضيفهاش تاني لو موجوده قبل كده)')
                            ->collection('testimonial_images')
                            ->multiple()
                            ->maxFiles(10)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                            ->columnSpanFull()
                            ->visible(fn (callable $get) => $get('type') === 'image'),

                        SpatieMediaLibraryFileUpload::make('testimonial_videos')
                            ->label('فيديوهات الرأي')
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
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('النوع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'danger',
                    }),

                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->label('الوسائط')
                    ->collection(fn (Testimonial $record): string => 
                        $record->type === 'image' ? 'testimonial_images' : 'testimonial_videos'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف متعدد'),
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
