<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSettingResource\Pages;
use App\Models\HomeSetting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
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
                                Forms\Components\Section::make('Hero Images')
                                    ->description('Set up the main hero section images')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('hero_image')
                                                ->collection('hero_image')
                                                ->label('الصورة الرئيسية')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('hero_bg_1')
                                                ->collection('hero_bg_1')
                                                ->label('صورة الخلفية 1')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('hero_bg_2')
                                                ->collection('hero_bg_2')
                                                ->label('صورة الخلفية 2')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('hero_bg_3')
                                                ->collection('hero_bg_3')
                                                ->label('صورة الخلفية 3')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                        ]),
                                    ]),
                                Forms\Components\Section::make('Hero Content')
                                    ->description('Configure the hero section content and text')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('hero_subtitle')
                                            ->label('العنوان الفرعي'),
                                        Forms\Components\TextInput::make('hero_title')
                                            ->label('العنوان الرئيسي'),
                                        Forms\Components\Textarea::make('hero_description')
                                            ->label('الوصف'),
                                    ]),
                                Forms\Components\Section::make('Call to Action')
                                    ->description('Configure the hero section buttons')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('button_1_text')
                                                ->label('نص الزر الأول'),
                                            Forms\Components\TextInput::make('button_1_link')
                                                ->label('رابط الزر الأول'),
                                        ]),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Counter Section')
                            ->schema([
                                Forms\Components\Section::make('Statistics')
                                    ->description('Configure the counter section statistics')
                                    ->collapsible()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('counter_title')
                                            ->label('عنوان قسم الإحصائيات')
                                            ->columnSpan(2),
                                        Forms\Components\TextInput::make('review_score')
                                            ->label('تقييم المنتجات'),
                                        Forms\Components\TextInput::make('review_count')
                                            ->label('عدد التقييمات')
                                            ->numeric(),
                                        Forms\Components\TextInput::make('exp_title')
                                            ->label('عنوان قسم الخبره'),
                                        Forms\Components\TextInput::make('exp_count')
                                            ->label('عدد السنوات'),
                                        Forms\Components\TextInput::make('sales_title')
                                            ->label('عنوان قسم المنتجات'),
                                        Forms\Components\TextInput::make('sales_count')
                                            ->label('عدد المنتجات'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Features Section')
                            ->schema([
                                Forms\Components\Section::make('Feature Images')
                                    ->description('Configure the feature section images')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Grid::make(3)->schema([
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('features_main_image')
                                                ->collection('features_main_image')
                                                ->label('الصورة الرئيسية')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('features_shape_1')
                                                ->collection('features_shape_1')
                                                ->label('صورة الشكل 1')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('features_shape_2')
                                                ->collection('features_shape_2')
                                                ->label('صورة الشكل 2')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                        ]),
                                    ]),
                                Forms\Components\Section::make('Feature Content')
                                    ->description('Configure the feature section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('features_subtitle')
                                            ->label('العنوان الفرعي لقسم المميزات'),
                                        Forms\Components\TextInput::make('features_title')
                                            ->label('عنوان قسم المميزات'),
                                    ]),
                                Forms\Components\Section::make('Feature Items')
                                    ->description('Add or edit feature items')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Repeater::make('feature_items')
                                            ->schema([
                                                Forms\Components\Grid::make(2)->schema([
                                                    Forms\Components\TextInput::make('title')
                                                        ->label('عنوان الميزة'),
                                                    FileUpload::make('icon')
                                                        ->disk('feature_icons')  // استخدام disk الذي قمت بتحديده في `filesystems.php`
                                                        ->directory('icons')  // يمكن تغيير المجلد داخل `feature-icons`
                                                        ->image()
                                                        ->label('أيقونة الميزة'),
                                                ]),
                                                Forms\Components\Textarea::make('description')
                                                    ->label('وصف الميزة'),
                                            ])
                                            ->label('المميزات')
                                            ->defaultItems(3)
                                            ->collapsible(),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Products Section')
                            ->schema([
                                Forms\Components\Section::make('Products Content')
                                    ->description('Configure the products section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('products_subtitle')
                                            ->label('العنوان الفرعي لقسم المنتجات'),
                                        Forms\Components\TextInput::make('products_title')
                                            ->label('عنوان قسم المنتجات'),
                                        Forms\Components\Textarea::make('products_description')
                                            ->label('وصف قسم المنتجات'),
                                    ]),
                                    Forms\Components\Section::make('Popular Products')
                                    ->description('Configure the popular products section')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('popular_products_subtitle')
                                            ->label('العنوان الفرعي لقسم المنتجات المميزة'),
                                        Forms\Components\TextInput::make('popular_products_title')
                                            ->label('عنوان قسم المنتجات المميزة'),
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('popular_products_bg')
                                            ->collection('popular_products_bg')
                                            ->label('خلفية قسم المنتجات المميزة')
                                            ->image()
                                            ->maxSize(5120)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->enableDownload()
                                            ->enableOpen()
                                            ->imageEditor()
                                            ->deleteUploadedFileUsing(fn () => true),
                                        Forms\Components\Repeater::make('about_features')
                                            ->schema([
                                                Forms\Components\Grid::make(2)->schema([
                                                    Forms\Components\TextInput::make('title')
                                                        ->label('عنوان الميزة')
                                                        ->required(),
                                                    FileUpload::make('icon')
                                                        ->disk('public')
                                                        ->directory('about-features')
                                                        ->image()
                                                        ->required()
                                                        ->label('أيقونة الميزة'),
                                                ]),
                                                Forms\Components\TextInput::make('text')
                                                    ->label('وصف الميزة')
                                                    ->required()
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(4)
                                            ->columns(1)
                                            ->collapsible()
                                            ->label('مميزات القسم')
                                            ->collapsible()
                                            ->defaultItems(3)
                                            ->columns(3) // إذا كنت تريد توزيعها بشكل مناسب
                                            ->reactive() // يمكن أن تكون مفيدة لتحديث العناصر بشكل ديناميكي
                                            ->afterStateHydrated(function ($state) {
                                                // تأكد من تحويل البيانات إلى تنسيق مناسب إذا كنت بحاجة إلى تخزينها بشكل معين
                                                foreach ($state as $key => $value) {
                                                    // هنا يمكنك إضافة أي منطق لتحويل أو تعديل القيم
                                                }
                                            }),
                                    ]),
                                
                            ]),

                        Forms\Components\Tabs\Tab::make('Video Section')
                            ->schema([
                                Forms\Components\Section::make('Video Configuration')
                                    ->description('Configure the video section settings')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('video_bg')
                                            ->collection('video_bg')
                                            ->label('صورة خلفية الفيديو')
                                            ->maxSize(5120)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->image()
                                            ->enableDownload()
                                            ->enableOpen()
                                            ->imageEditor()
                                            ->deleteUploadedFileUsing(fn () => true),
                                        Forms\Components\TextInput::make('video_url')
                                            ->label('رابط الفيديو')
                                            ->url(),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('About Coffee Section')
                            ->schema([
                                Forms\Components\Section::make('About Image')
                                    ->description('Configure the about section main image')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('about_image')
                                            ->collection('about_image')
                                            ->label('الصورة الرئيسية')
                                            ->image()
                                            ->maxSize(5120)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->enableDownload()
                                            ->enableOpen()
                                            ->imageEditor()
                                            ->deleteUploadedFileUsing(fn () => true),
                                    ]),
                                Forms\Components\Section::make('About Content')
                                    ->description('Configure the about section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('about_subtitle')
                                            ->label('العنوان الفرعي')
                                            ->default('About The Coffee'),
                                        Forms\Components\TextInput::make('about_title')
                                            ->label('العنوان الرئيسي')
                                            ->default('We care about the quality of our products'),
                                        Forms\Components\Textarea::make('about_description')
                                            ->label('الوصف')
                                            ->default('Drinking coffee is one of the best global things you do each days here i can spend a long and comfortable time with this workspace facilities'),
                                    ]),
                                Forms\Components\Section::make('About Features')
                                    ->description('Add or edit about section features')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Repeater::make('about_features')
                                            ->schema([
                                                Forms\Components\Grid::make(3)->schema([
                                                    Forms\Components\TextInput::make('title')
                                                        ->label('عنوان الميزة'),
                                                    Forms\Components\TextInput::make('text')
                                                        ->label('وصف الميزة'),
                                                    Forms\Components\SpatieMediaLibraryFileUpload::make('icon')
                                                        ->collection('about_feature_icons')
                                                        ->label('أيقونة الميزة')
                                                        ->image()
                                                        ->maxSize(5120)
                                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                                        ->enableDownload()
                                                        ->enableOpen()
                                                        ->imageEditor()
                                                        ->deleteUploadedFileUsing(fn () => true),
                                                ]),
                                            ])

                                            ->label('ميزات القسم')
                                            ->defaultItems(4)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                    ]),
                                Forms\Components\Section::make('Call to Action')
                                    ->description('Configure the about section button')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('about_button_text')
                                            ->label('نص الزر')
                                            ->default('Purchase now'),
                                        Forms\Components\TextInput::make('about_button_link')
                                            ->label('رابط الزر')
                                            ->default('contact.html'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('FAQ Section')
                            ->schema([
                                Forms\Components\Section::make('FAQ Background')
                                    ->description('Set the FAQ section background image')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('faq_bg')
                                            ->collection('faq_bg')
                                            ->label('خلفية قسم الأسئلة')
                                            ->image()
                                            ->maxSize(5120)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->enableDownload()
                                            ->enableOpen()
                                            ->imageEditor()
                                            ->deleteUploadedFileUsing(fn () => true),
                                    ]),
                                Forms\Components\Section::make('FAQ Content')
                                    ->description('Configure the FAQ section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('faq_subtitle')
                                            ->label('العنوان الفرعي')
                                            ->default('FAQ'),
                                        Forms\Components\TextInput::make('faq_title')
                                            ->label('العنوان الرئيسي')
                                            ->default('Frequently Asked Questions'),
                                        Forms\Components\TextInput::make('faq_button_text')
                                            ->label('نص زر المزيد من الأسئلة')
                                            ->default('Visit More FAQ'),
                                    ]),
                                Forms\Components\Section::make('FAQ Items')
                                    ->description('Add or edit FAQ items')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Repeater::make('faq_items')
                                            ->schema([
                                                Forms\Components\TextInput::make('question')
                                                    ->label('السؤال')
                                                    ,
                                                Forms\Components\Textarea::make('answer')
                                                    ->label('الإجابة')
                                                    ,
                                            ])
                                            ->defaultItems(6)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                                            ->reorderable(),
                                    ]),
                                Forms\Components\Section::make('Contact Form')
                                    ->description('Configure the contact form section')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('faq_form_subtitle')
                                            ->label('العنوان الفرعي للنموذج')
                                            ->default('Get More Update'),
                                        Forms\Components\TextInput::make('faq_form_title')
                                            ->label('عنوان النموذج')
                                            ->default('Send Us a Message'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Blogs Section')
                            ->schema([
                                Forms\Components\Section::make('Blogs Content')
                                    ->description('Configure the blogs section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\TextInput::make('blogs_subtitle')
                                            ->label('العنوان الفرعي')
                                            ->default('Blog & News'),
                                        Forms\Components\TextInput::make('blogs_title')
                                            ->label('العنوان الرئيسي')
                                            ->default('Our Community'),
                                        Forms\Components\TextInput::make('blogs_button_text')
                                            ->label('نص زر عرض جميع المقالات')
                                            ->default('View All Articles'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Newsletter Section')
                            ->schema([
                                Forms\Components\Section::make('Newsletter Content')
                                    ->description('Configure the newsletter section content')
                                    ->collapsible()
                                    ->schema([
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\SpatieMediaLibraryFileUpload::make('promo_image')
                                                ->collection('newsletter_image')
                                                ->label('الصوره الترويجيه')
                                                ->maxSize(5120)
                                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                ->image()
                                                ->enableDownload()
                                                ->enableOpen()
                                                ->imageEditor()
                                                ->deleteUploadedFileUsing(fn () => true),
                                      
                                        ]),
                                        
                                    ]),
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

