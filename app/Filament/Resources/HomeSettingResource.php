<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSettingResource\Pages;
use App\Models\HomeSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class HomeSettingResource extends Resource
{
    protected static ?string $model = HomeSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'الموقع';
    protected static ?string $navigationLabel = 'الصفحة الرئيسية';
    protected static ?string $modelLabel = 'إعدادات الصفحة الرئيسية';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Home Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Hero Section')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('hero_image')
                                        ->collection('hero_image')
                                        ->label('الصورة الرئيسية'),
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('hero_bg_1')
                                        ->collection('hero_bg_1')
                                        ->label('صورة الخلفية 1'),
                                ]),
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('hero_bg_2')
                                        ->collection('hero_bg_2')
                                        ->label('صورة الخلفية 2'),
                                ]),
                                Forms\Components\TextInput::make('hero_subtitle')
                                    ->label('العنوان الفرعي')
                                    ,
                                Forms\Components\TextInput::make('hero_title')
                                    ->label('العنوان الرئيسي')
                                    ,
                                Forms\Components\Textarea::make('hero_description')
                                    ->label('الوصف')
                                    ,
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\TextInput::make('button_1_text')
                                        ->label('نص الزر الأول'),
                                    Forms\Components\TextInput::make('button_1_link')
                                        ->label('رابط الزر الأول'),
                                ]),
                                // Forms\Components\Grid::make(2)->schema([
                                //     Forms\Components\TextInput::make('button_2_text')
                                //         ->label('نص الزر الثاني'),
                                //     Forms\Components\TextInput::make('button_2_link')
                                //         ->label('رابط الزر الثاني'),
                                // ]),
                            ]),
                            
                        Forms\Components\Tabs\Tab::make('Counter Section')
                            ->schema([
                                Forms\Components\TextInput::make('counter_title')
                                    ->label('عنوان قسم الإحصائيات')
                                    ,
                                Forms\Components\TextInput::make('review_score')
                                    ->label('تقييم المنتجات')
                                    ,
                                Forms\Components\TextInput::make('review_count')
                                    ->label('عدد التقييمات')
                                    ->numeric()
                                    ,
                                Forms\Components\TextInput::make('exp_title')
                                    ->label('عنوان قسم الخبره')
                                    ,
                                Forms\Components\TextInput::make('exp_count')
                                    ->label('عدد السنوات')
                                    ,
                                Forms\Components\TextInput::make('sales_title')
                                    ->label('عنوان قسم المنتجات')
                                    ,
                                Forms\Components\TextInput::make('sales_count')
                                    ->label('عدد المنتجات')
                                    ,
                            ]),
                            
                        Forms\Components\Tabs\Tab::make('Features Section')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('features_main_image')
                                        ->collection('features_main_image')
                                        ->label('الصورة الرئيسية'),
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('features_shape_1')
                                        ->collection('features_shape_1')
                                        ->label('صورة الشكل 1'),
                                ]),
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\SpatieMediaLibraryFileUpload::make('features_shape_2')
                                        ->collection('features_shape_2')
                                        ->label('صورة الشكل 2'),
                                ]),
                                Forms\Components\TextInput::make('features_subtitle')
                                    ->label('العنوان الفرعي لقسم المميزات')
                                    ,
                                Forms\Components\TextInput::make('features_title')
                                    ->label('عنوان قسم المميزات')
                                    ,
                                Forms\Components\Repeater::make('feature_items')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('عنوان الميزة')
                                            ,
                                        Forms\Components\Textarea::make('description')
                                            ->label('وصف الميزة')
                                            ,
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('icon')
                                            ->collection('feature_icons')
                                            ->label('أيقونة الميزة'),
                                    ])
                                    ->label('المميزات')
                                    ->defaultItems(3)
                                    ->collapsible(),
                            ]),
                            
                        Forms\Components\Tabs\Tab::make('Products Section')
                            ->schema([
                                Forms\Components\TextInput::make('products_subtitle')
                                    ->label('العنوان الفرعي لقسم المنتجات')
                                    ,
                                Forms\Components\TextInput::make('products_title')
                                    ->label('عنوان قسم المنتجات')
                                    ,
                                Forms\Components\Textarea::make('products_description')
                                    ->label('وصف قسم المنتجات')
                                    ,
                            ]),
                            
                        Forms\Components\Tabs\Tab::make('Video Section')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('video_bg')
                                    ->collection('video_bg')
                                    ->label('صورة خلفية الفيديو'),
                                Forms\Components\TextInput::make('video_url')
                                    ->label('رابط الفيديو')
                                    ->url(),
                            ]),
                            
                        Forms\Components\Tabs\Tab::make('Newsletter Section')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('promo_image')
                                    ->label('الصوره الترويجيه')
                                    ,
                                Forms\Components\TextInput::make('promo_url')
                                    ->label('رابط الصوره')
                                    ,
                                // Forms\Components\Textarea::make('newsletter_description')
                                //     ->label('وصف النشرة البريدية')
                                //     ,
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->label('عنوان القسم الرئيسي')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([])
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
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeSettings::route('/'),
            'create' => Pages\CreateHomeSetting::route('/create'),
            'edit' => Pages\EditHomeSetting::route('/{record}/edit'),
        ];
    }    
}