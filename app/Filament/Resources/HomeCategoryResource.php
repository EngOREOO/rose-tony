<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeCategoryResource\Pages;
use App\Filament\Resources\HomeCategoryResource\RelationManagers;
use App\Models\HomeCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeCategoryResource extends Resource
{
    protected static ?string $model = HomeCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "الاقسام الرئيسية";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('بيانات القسم الأساسية')
                    ->description('أدخل البيانات الرئيسية لهذا القسم')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('اسم القسم')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('صورة القسم')
                            ->image()
                            ->imagePreviewHeight('150')
                            ->directory('categories')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->maxLength(1000),
                    ])
                    ->columns(2) // ← نقسمهم على عمودين لعرض مرتب
                    ->collapsible()
                    ->collapsed(false), // يبدأ مفتوحًا


                Forms\Components\Section::make("تحسين محركات البحث (SEO)")
                    ->description("أدخل بيانات تحسين محركات البحث الخاصة بهذا المنتج")
                    ->schema([
                        Forms\Components\TagsInput::make("meta_tags")
                            ->label("الميتا تاجز")
                            ->columnSpanFull()
                            ->placeholder("اكتب التاج واضغط Enter")
                            ->helperText("مثال: أفضل منتج، عناية بالبشرة، منتج طبيعي")
                            ->separator(','),

                        Forms\Components\RichEditor::make("meta_description")
                            ->label("الميتا ديسكربشن")
                            ->columnSpanFull()
                            ->helperText("وصف مختصر يظهر في نتائج البحث - يُفضل ألا يزيد عن 160 حرفًا"),

                        Forms\Components\TagsInput::make("focus_keywords")
                            ->label("الكلمات المفتاحية الرئيسية")
                            ->placeholder("أدخل كلمة مفتاحية واضغط Enter")
                            ->separator(','),

                        Forms\Components\TagsInput::make("slug")
                            ->separator(',')
                            ->label("الرابط"),
                    ])
                    ->columns(1)
                    ->collapsible() // ← ده بيخلي السيكشن collapsible
                    ->collapsed(),  // ← بيبدأ السيكشن مغلق افتراضيًا
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
          ->columns([
                ImageColumn::make('image')->label('الصورة')->circular(),
                Tables\Columns\TextColumn::make('name')->label('اسم القسم')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإضافة')->dateTime(),
            ])  
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListHomeCategories::route('/'),
            'create' => Pages\CreateHomeCategory::route('/create'),
            'edit' => Pages\EditHomeCategory::route('/{record}/edit'),
        ];
    }
}
