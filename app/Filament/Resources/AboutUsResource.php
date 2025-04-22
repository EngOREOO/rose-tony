<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'نظام التحكم بالمحتوي';
    protected static ?string $modelLabel = 'من نحن';
    protected static ?string $pluralModelLabel = 'من نحن';
    


    public static function form(Form $form): Form
{
    return $form
        ->schema([         
            Forms\Components\Section::make('Main Content')
                ->description('Customize your About Us page')
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\FileUpload::make('top_image')
                                ->label('Top Image')
                                ->image()
                                ->disk('public')
                                ->directory('about_us/images')
                                ->maxSize(1024) // تحديد الحجم الأقصى بالصورة (1MB)
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']) // تحديد أنواع الصور المسموحة
                                ->helperText('Upload an image with size 1920x200 px')
                                ->required(),
                            Forms\Components\TextInput::make('head_text')
                                ->label('Title / Headline')
                                ->placeholder('Enter the main headline...')
                                ->required()
                                ->columnSpanFull(),

                            Forms\Components\RichEditor::make('paragraph')
                                ->label('Introduction Paragraph')
                                ->placeholder('Write something about your company...')
                                ->columnSpanFull()
                                ->toolbarButtons([
                                    'bold', 'italic', 'underline', 'strike', 'bulletList', 'orderedList', 'link',
                                ])
                                ->required(),
                        ]),

                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('video_url')
                                ->label('Video URL')
                                ->url()
                                ->placeholder('https://example.com/video')
                                ->helperText('YouTube/Vimeo embed link')
                                ->nullable(),

                    FileUpload::make('under_video_image')
                                ->label('Upload Image Under Video')
                                ->image()
                                ->directory('about_us/images')
                                ->imagePreviewHeight('150')
                                ->helperText('This image appears under the video section')
                                ->nullable(),
                        Forms\Components\FileUpload::make('side_images')
                                ->label('Side Images')
                                ->helperText('Upload images to appear beside About Us content.')
                                ->directory('about_us/side_images')
                                ->image()
                                ->imagePreviewHeight('150')
                                ->multiple()
                                ->reorderable()
                                ->nullable(),
                            
                            
                        ]),
                ])
                ->columns(1)
                ->collapsible(),

            Forms\Components\Section::make('Why Us Section')
                ->schema([
                    Forms\Components\RichEditor::make('why_choose_us')
                        ->label('Why Choose Us')
                        ->placeholder('Mention key features or advantages...')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'bulletList', 'orderedList',
                        ])
                        ->nullable(),

                    Forms\Components\RichEditor::make('our_mission')
                        ->label('Our Mission')
                        ->placeholder('Your company’s mission goes here...')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'bulletList', 'orderedList',
                        ])
                        ->nullable(),

                    Forms\Components\RichEditor::make('our_principles')
                        ->label('Our Principles')
                        ->placeholder('Core principles or values...')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'bulletList', 'orderedList',
                        ])
                        ->nullable(),
                ])
                ->columns(1)
                ->collapsible(),

                Forms\Components\Section::make('Partners Logos')
            ->description('Upload logos of your partners')
            ->schema([
                Forms\Components\Repeater::make('partners_logos')
                    ->label('Partners Logos')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Partner Logo')
                            ->image()
                            ->imagePreviewHeight('100')
                            ->directory('about_us/partners') // مسار الحفظ داخل storage/app/public
                            ->preserveFilenames()
                            ->maxSize(1024),
                    ])
                    ->createItemButtonLabel('➕ Add Logo')
                    ->columnSpanFull(),
            ])
            ->columns(1)
            ->collapsible(),

            Forms\Components\Section::make('App Benefits')
                ->description('List benefits of using your app or service')
                ->schema([
                    Forms\Components\Repeater::make('application_benefits')
                        ->label('Application Benefits')
                        ->schema([
                            Forms\Components\TextInput::make('benefit_text')
                                ->label('Benefit Text')
                                ->placeholder('E.g. 24/7 Customer Support'),
                        ])
                        ->createItemButtonLabel('➕ Add Benefit')
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('head_text')->limit(50),
                Tables\Columns\TextColumn::make('paragraph')->limit(50),
                Tables\Columns\TextColumn::make('video_url')->limit(50),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
