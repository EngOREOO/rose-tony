<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationGroup = 'المتجر';
    protected static ?string $navigationLabel = 'الكوبونات والخصومات';
    protected static ?string $modelLabel = 'كوبون';
    protected static ?string $pluralModelLabel = 'كوبونات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('تفاصيل الكوبون')
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->label('كود الكوبون'),

                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'gift' => 'منتج مجاني (هدية)',
                                'percentage' => 'خصم نسبة مئوية',
                                'fixed' => 'خصم مبلغ ثابت',
                                'both' => 'خصم نسبة ومبلغ معاً',
                            ])
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if ($state === 'fixed') {
                                    $set('percentage_discount', null);
                                } elseif ($state === 'percentage') {
                                    $set('fixed_discount', null);
                                }
                            }),

                        Forms\Components\Select::make('gift_product_id')
                            ->relationship('giftProduct', 'name')
                            ->searchable()
                            ->preload()
                            ->visible(fn (Forms\Get $get) => $get('type') === 'gift'),

                        Forms\Components\TextInput::make('percentage_discount')
                            ->label('نسبة الخصم (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->visible(fn (Forms\Get $get) => in_array($get('type'), ['percentage', 'both'])),

                        Forms\Components\TextInput::make('fixed_discount')
                            ->label('قيمة الخصم الثابت')
                            ->numeric()
                            ->minValue(0)
                            ->visible(fn (Forms\Get $get) => in_array($get('type'), ['fixed', 'both'])),

                        Forms\Components\TextInput::make('minimum_amount')
                            ->label('الحد الأدنى للسلة')
                            ->helperText('الحد الأدنى لإجمالي السلة المطلوب لاستخدام هذا الكوبون')
                            ->numeric()
                            ->minValue(0),

                        Forms\Components\DateTimePicker::make('starts_at')
                            ->label('صالح من')
                            ->nullable(),

                        Forms\Components\DateTimePicker::make('expires_at')
                            ->label('صالح حتى')
                            ->nullable(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),

                        Forms\Components\TextInput::make('usage_limit')
                            ->label('حد الاستخدام')
                            ->helperText('الحد الأقصى لعدد مرات استخدام هذا الكوبون')
                            ->numeric()
                            ->minValue(1)
                            ->nullable(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->colors([
                        'primary' => 'gift',
                        'success' => 'percentage',
                        'warning' => 'fixed',
                        'danger' => 'both',
                    ]),
                Tables\Columns\TextColumn::make('percentage_discount')
                    ->label('نسبة الخصم %')
                    ->numeric(),
                Tables\Columns\TextColumn::make('fixed_discount')
                    ->label('الخصم الثابت')
                    ->money('ج.م'),
                Tables\Columns\TextColumn::make('minimum_amount')
                    ->label('الحد الأدنى')
                    ->money('ج.م'),
                Tables\Columns\TextColumn::make('used_count')
                    ->label('الاستخدامات')
                    ->alignCenter(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('نشط'),
                Tables\Columns\TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'gift' => 'منتج مجاني (هدية)',
                        'percentage' => 'خصم نسبة مئوية',
                        'fixed' => 'خصم مبلغ ثابت',
                        'both' => 'كلاهما',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط'),
                Tables\Filters\TernaryFilter::make('expired')
                    ->label('منتهي الصلاحية')
                    ->queries(
                        true: fn (Builder $query) => $query->where('expires_at', '<', now()),
                        false: fn (Builder $query) => $query->where(function ($query) {
                            $query->whereNull('expires_at')
                                ->orWhere('expires_at', '>=', now());
                        }),
                    ),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}