<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use App\Models\HomeCategory;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = "heroicon-o-shopping-bag";
    protected static ?string $navigationLabel = "المنتجات";
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make("معلومات أساسية")
                ->description("أدخل التفاصيل العامة للمنتج")
                ->schema([
                    Forms\Components\TextInput::make("name")
                        ->label("اسم المنتج")
                        ->required()
                        ->maxLength(255),
                        Forms\Components\Select::make('home_category_id')
                        ->label('التصنيف')
                        ->options(
                            HomeCategory::pluck('name', 'id')->toArray()
                        )
                        ->searchable()
                        ->required(), // نخليه مطلوب

                    Forms\Components\TextInput::make("price")
                        ->label("السعر الأصلي")
                        ->required()
                        ->numeric()
                        ->prefix("ح.م"),
                    Forms\Components\TextInput::make("discounted_price")
                        ->label("السعر بعد الخصم")
                        ->numeric()
                        ->prefix("ح.م"),
                ])
                ->columns(2),

           Forms\Components\Section::make("وصف المنتج")
                ->description("قدم وصفًا تفصيليًا للمنتج")
                ->schema([
                    Forms\Components\RichEditor::make("description")->label("وصف المنتج")->columnSpanFull(),
                    Forms\Components\RichEditor::make("benefits")->label("الفوائد")->columnSpanFull(),
                    Forms\Components\RichEditor::make("ingredients")->label("المكونات")->columnSpanFull(),
                    Forms\Components\RichEditor::make("usage")->label("طريقة الاستخدام")->columnSpanFull(),
                    Forms\Components\RichEditor::make("precautions")->label("الاحتياطات")->columnSpanFull(),
                    Forms\Components\RichEditor::make("advatigs")->label("مميزات")->columnSpanFull(),
                    Forms\Components\RichEditor::make("notes")->label("ملاحظات")->columnSpanFull(),
                ])
                ->columns(1),


            Forms\Components\Section::make("تفاصيل إضافية")
                ->schema([
                    Forms\Components\TextInput::make("size")->label("الحجم"),
                    // Forms\Components\TextInput::make("video")->label(
                    //     "رابط الفيديو"
                    // ),

                    Forms\Components\TextInput::make("quantity")
                        ->label("الكمية")
                        ->required()
                        ->numeric()
                        ->default(0),
                    Forms\Components\Toggle::make("in_stock")
                        ->label("متوفر في المخزون")
                        ->default(true),

                    Forms\Components\Section::make("آراء العملاء - صور")
                        ->schema([
                            Forms\Components\FileUpload::make("customer_reviews")
                                ->label("صور آراء العملاء")
                                ->image()
                                ->multiple()
                                ->reorderable()
                                ->maxFiles(10)
                                ->directory('reviews')
                                ->enableOpen()
                                ->enableDownload(),
                        ]),
                    Forms\Components\Select::make('video_input_type')
                        ->label('طريقة إدخال الفيديو')
                        ->options([
                            'upload' => 'رفع فيديو',
                            'link' => 'رابط فيديو',
                        ])
                        ->default('link')
                        ->reactive(), // ← ده أهم حاجة علشان الفورم يتحدث لحظيًا

                    Forms\Components\FileUpload::make("video_file")
                        ->label("رفع الفيديو")
                        ->visible(fn ($get) => $get('video_input_type') === 'upload'),

                    Forms\Components\TextInput::make("video_link")
                        ->label("رابط الفيديو")
                        ->visible(fn ($get) => $get('video_input_type') === 'link'),


                ])
                ->columns(2),
            // Forms\Components\Section::make("الفارييشن")
            //     ->description("حدد نوع الفارييشن وأضف التفاصيل")
            //     ->schema([
            //         Forms\Components\Select::make('variation_type')
            //             ->label('نوع الفارييشن')
            //             ->options([
            //                 'scents' => 'روائح',
            //                 'colors' => 'ألوان',
            //             ])
            //             ->required()
            //             ->native(false)
            //             ->reactive(), // لجعل الاختيار ينفذ التغييرات تلقائيًا

            //         Repeater::make('scents_list')
            //             ->label('قائمة الروائح')
            //             ->schema([
            //                 TextInput::make('name')->label('اسم الرائحة')->required(),
            //             ])
            //             ->createItemButtonLabel('إضافة رائحة')
            //             ->visible(fn(\Filament\Forms\Get $get) => $get('variation_type') === 'scents'), // يظهر فورًا إذا تم اختيار "روائح"

            //         Repeater::make('colors_list')
            //             ->label('قائمة الألوان')
            //             ->schema([
            //                 TextInput::make('name')->label('اسم اللون')->required(),
            //             ])
            //             ->createItemButtonLabel('إضافة لون')
            //             ->visible(fn(\Filament\Forms\Get $get) => $get('variation_type') === 'colors'), // يظهر فورًا إذا تم اختيار "ألوان"
            //     ])
            //     ->columns(1),

            Forms\Components\Section::make("تحسين محركات البحث (SEO)")
                ->description("أدخل بيانات تحسين محركات البحث الخاصة بهذا المنتج")
                ->schema([
                    Forms\Components\TagsInput::make("meta_tags")
                        ->label("الميتا تاجز")
                        ->columnSpanFull()
                        ->placeholder("اكتب التاج واضغط Enter")
                        ->helperText("مثال: أفضل منتج، عناية بالبشرة، منتج طبيعي")
                        ->separator(','), // الإعداد ده تمام هنا

                    Forms\Components\RichEditor::make("meta_description")
                        ->label("الميتا ديسكربشن")
                        ->columnSpanFull()
                        ->helperText("وصف مختصر يظهر في نتائج البحث - يُفضل ألا يزيد عن 160 حرفًا"),

                    Forms\Components\TagsInput::make("focus_keywords")
                        ->label("الكلمات المفتاحية الرئيسية")
                        ->columnSpanFull()
                        ->placeholder("أدخل كلمة مفتاحية واضغط Enter")
                        ->helperText("الكلمات اللي المستخدم ممكن يبحث بيها عشان يلاقي المنتج ده")
                        ->separator(','), // الإعداد ده تمام هنا

                        // ===== تصحيح حقل الرابط (Slug) =====
                        Forms\Components\TextInput::make("slug")
                            ->label("الرابط (Slug)")
                            ->helperText("جزء الرابط الفريد للمنتج (يُستخدم في الـ URL). استخدم حروف إنجليزية وأرقام وشرطات (-).")
                            ->required() // مهم: الـ Slug عادة بيكون مطلوب
                            ->unique(Product::class, 'slug', ignoreRecord: true) // مهم: يتأكد إن الرابط ده محدش استخدمه قبل كده (مع تجاهل المنتج الحالي لو بتعدل)
                            ->placeholder('مثال: awesome-product-name-123')
                            ->columnSpanFull(), // عشان ياخد عرض الشاشة زي اللي فوقه
                            /**
                             * ملاحظة: بدل الإدخال اليدوي، ممكن تخلي الـ Slug يتعمل تلقائي
                             * من اسم المنتج باستخدام ->live() و ->afterStateUpdated() على حقل اسم المنتج
                             * وتخلي الحقل ده ->disabled()->dehydrated()
                             * مثال (تكتبه عند حقل اسم المنتج مش هنا):
                             * ->live(onBlur: true)
                             * ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state)))
                             */

                    ])
                    ->columns(1), // عدد الأعمدة في السيكشن




            Forms\Components\Section::make("المنتجات ذات الصلة")
                ->schema([
                    Forms\Components\Select::make("gift_products")
                        ->label("منتجات هدية")
                        ->multiple()
                        ->options(function () {
                            return \App\Models\Product::pluck(
                                "name",
                                "id"
                            )->toArray();
                        })
                        ->searchable(),
                    Forms\Components\Select::make("related_products")
                        ->label("منتجات مشابهة (العروض)")
                        ->multiple()
                        ->options(function () {
                            return \App\Models\Product::pluck(
                                "name",
                                "id"
                            )->toArray();
                        })
                        ->searchable(),
                ])
                ->columns(2),

            Forms\Components\Section::make("صور المنتج")->schema([
                SpatieMediaLibraryFileUpload::make("product_images")
                    ->collection("product_images")
                    ->multiple()
                    ->maxFiles(5),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")
                    ->label("اسم المنتج")
                    ->searchable(),
                Tables\Columns\TextColumn::make("category.name")
                    ->label("التصنيف")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("price")
                    ->label("السعر")
                    ->money("L,E")
                    ->sortable(),
                Tables\Columns\TextColumn::make("quantity")
                    ->label("الكمية المتوفرة")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make("in_stock")
                    ->label("متوفر")
                    ->boolean(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make(
                    "صورة_المنتج"
                )->collection("product_images"),
                Tables\Columns\TextColumn::make("created_at")
                    ->label("تاريخ الإضافة")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make("updated_at")
                    ->label("آخر تحديث")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Category Filter
                Tables\Filters\SelectFilter::make("category_id")
                    ->label("التصنيف")
                    ->relationship("category", "name")
                    ->searchable()
                    ->preload(),

                // Stock Status Filter
                Tables\Filters\SelectFilter::make("in_stock")
                    ->label("حالة المخزون")
                    ->options([
                        "1" => "متوفر",
                        "0" => "غير متوفر",
                    ]),

                // Date Range Filter
                Tables\Filters\Filter::make("created_at")
                    ->label("تاريخ الإضافة")
                    ->form([
                        Forms\Components\DatePicker::make(
                            "created_from"
                        )->label("من تاريخ"),
                        Forms\Components\DatePicker::make(
                            "created_until"
                        )->label("إلى تاريخ"),
                    ])
                    ->query(function ($query, array $data): mixed {
                        return $query
                            ->when(
                                $data["created_from"],
                                fn($query) => $query->whereDate(
                                    "created_at",
                                    ">=",
                                    $data["created_from"]
                                )
                            )
                            ->when(
                                $data["created_until"],
                                fn($query) => $query->whereDate(
                                    "created_at",
                                    "<=",
                                    $data["created_until"]
                                )
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make("updateStockStatus")
                        ->label("تغيير حالة المخزون")
                        ->icon("heroicon-o-check-circle")
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Toggle::make("in_stock")
                                ->label("متوفر في المخزون")
                                ->default(true),
                        ])
                        ->action(function (
                            \Illuminate\Database\Eloquent\Collection $records,
                            array $data
                        ): void {
                            $records->each(function ($record) use (
                                $data
                            ): void {
                                $record->update([
                                    "in_stock" => $data["in_stock"],
                                ]);
                            });
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            "index" => Pages\ListProducts::route("/"),
            "create" => Pages\CreateProduct::route("/create"),
            "edit" => Pages\EditProduct::route("/{record}/edit"),
        ];
    }
}