<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
// use Filament\Forms\Components\Actions\Action;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'الطلبات';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
           Section::make('معلومات المنتج')
    ->schema([
        Select::make('product_id')
            ->label('المنتج')
            ->relationship('product', 'name')
            ->required()
            ->reactive()
            ->afterStateUpdated(fn (callable $set, callable $get, $state) =>
                $set('total', Product::find($state)->price ?? 0)),
        
        TextInput::make('ordered_quantity')
            ->label('الكمية المطلوبة') // هذه التسمية ستظهر فوق الحقل
            ->disabled() // لجعل الحقل غير قابل للتعديل
            ->default(function (Closure $get) {
                // يمكنك هنا إرجاع الكمية بناءً على المنتج المختار إذا كانت مرتبطة
                $productId = $get('product_id'); // الحصول على product_id باستخدام $get
                $product = Product::find($productId);
                return $product ? $product->quantity : 0; // إعادة الكمية للمنتج أو 0 إذا لم يوجد
            }),
    ])->columnSpanFull(),   

            Section::make('معلومات العميل')
                ->schema([
                    TextInput::make('first_name')
                        ->label('الاسم الأول')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('phone')
                        ->label('رقم الهاتف')
                        ->tel()
                        ->maxLength(255),
                    TextInput::make('selected_colors')
                        ->label('اللون')
                        ->formatStateUsing(function ($state) {
                            $colored = json_decode($state, true);
                            if (!is_array($colored)) {
                                return $state; // Fallback
                            }
                            $result = '';
                            foreach ($colored as $color) {
                                $result .= $color['color'] . ' (' . $color['quantity'] . ') ';
                            }
                            return trim($result);
                        })
                        ->maxLength(255),
                ])->columns(2),

            Section::make('عنوان الشحن')
                ->schema([
                    TextInput::make('country')
                        ->label('الدولة')
                        ->required()
                        ->maxLength(255)
                        ->default('مصر'),
                    TextInput::make('street_address')
                        ->label('عنوان الشارع')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('apartment')
                        ->label('الشقة')
                        ->maxLength(255),
                    TextInput::make('city')
                        ->label('المدينة')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('region')
                        ->label('المنطقة')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),

            Section::make('تفاصيل الطلب')
                ->schema([
                    Select::make('payment_method')
                        ->label('طريقة الدفع')
                        ->options([
                            'cash_on_delivery' => 'الدفع عند الاستلام',
                        ])
                        ->default('cash_on_delivery')
                        ->required(),
                    Select::make('status')
                        ->label('حالة الطلب')
                        ->options([
                            'pending' => 'قيد الانتظار',
                            'processing' => 'قيد المعالجة',
                            'completed' => 'مكتمل',
                            'cancelled' => 'ملغى',
                        ])
                        ->default('pending')
                        ->required(),
                    TextInput::make('total')
                        ->label('المجموع الكلي')
                        ->required()
                        ->numeric()
                        ->prefix('$'),
                    Textarea::make('notes')
                        ->label('ملاحظات')
                        ->maxLength(65535)
                        ->columnSpanFull(),
                ])->columns(2),

            // ✅ فاتورة كدروب داون
                Section::make('الفاتورة')
                    ->collapsible()
                    ->schema([
                        Group::make([
                            TextInput::make('full_name')
                                ->disabled()
                                ->disableLabel()
                                ->formatStateUsing(fn ($record) => $record ? $record->first_name . ' ' . $record->last_name : ''),
                        ]),
                        TextInput::make('phone')
                            ->disabled()
                            ->disableLabel(),
                        TextInput::make('color')
                            ->disabled()
                            ->disableLabel(),
                        TextInput::make('country')
                            ->disabled()
                            ->disableLabel(),
                        TextInput::make('street_address')
                            ->disabled()
                            ->disableLabel(),
                        TextInput::make('apartment')
                            ->disabled()
                            ->disableLabel(),
                        
                        // Add Copy Button
                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('copy_invoice')
                                ->label('نسخ بيانات الفاتورة')
                                ->icon('heroicon-o-clipboard-document')
                                ->modalContent(function ($record) {
                                    // Format date in a readable format
                                    $orderDate = $record->created_at ? $record->created_at->format('Y-m-d H:i') : 'غير متوفر';
                                    
                                    // Build comprehensive invoice data
                                    $invoiceData = "=== بيانات الفاتورة ===\n\n";
                                    
                                    // Order details
                                    $invoiceData .= "رقم الطلب: {$record->id}\n";
                                    $invoiceData .= "تاريخ الطلب: {$orderDate}\n";
                                    $invoiceData .= "حالة الطلب: {$record->status}\n";
                                    $invoiceData .= "طريقة الدفع: {$record->payment_method}\n\n";
                                    
                                    // Customer details
                                    $invoiceData .= "=== بيانات العميل ===\n";
                                    $invoiceData .= "الاسم: {$record->first_name} {$record->last_name}\n";
                                    $invoiceData .= "البريد الإلكتروني: {$record->email}\n";
                                    $invoiceData .= "رقم الهاتف: {$record->phone}\n\n";
                                    
                                    // Shipping details
                                    $invoiceData .= "=== بيانات الشحن ===\n";
                                    $invoiceData .= "الدولة: {$record->country}\n";
                                    $invoiceData .= "المدينة: {$record->city}\n";
                                    $invoiceData .= "المنطقة: {$record->region}\n";
                                    $invoiceData .= "الرمز البريدي: {$record->postal_code}\n";
                                    $invoiceData .= "العنوان: {$record->street_address}\n";
                                    $invoiceData .= "الشقة/المبنى: {$record->apartment}\n\n";
                                    
                                    // Product details
                                    $invoiceData .= "=== تفاصيل المنتج ===\n";
                                    $invoiceData .= "المنتج: {$record->product->name}\n";
                                    $invoiceData .= "اللون: {$record->color}\n";
                                    $invoiceData .= "السعر: {$record->product->price} ريال\n";
                                    if (!empty($record->product->discounted_price)) {
                                        $invoiceData .= "السعر بعد الخصم: {$record->product->discounted_price} ريال\n";
                                    }
                                    
                                    // Order notes
                                    if (!empty($record->notes)) {
                                        $invoiceData .= "\n=== ملاحظات ===\n";
                                        $invoiceData .= "{$record->notes}\n";
                                    }
                                    
                                    // Total
                                    $invoiceData .= "\n=== المجموع ===\n";
                                    $invoiceData .= "المجموع الكلي: {$record->total} ريال\n";
                                    
                                    // Create a textarea with the invoice data
                                    return view('filament.components.invoice-data', [
                                        'invoiceData' => $invoiceData,
                                    ]);
                                })
                                ->modalHeading('نسخ بيانات الفاتورة')
                                ->modalSubmitAction(false)
                                ->modalCancelAction(false)
                                ->modalFooterActions(fn () => [
                                    Action::make('copy')
                                        ->label('نسخ')
                                        ->color('primary')
                                        ->extraAttributes(['x-on:click' => 'navigator.clipboard.writeText(document.getElementById(\'invoice-data\').value); $dispatch(\'close\'); $dispatch(\'notify\', { message: \'تم نسخ بيانات الفاتورة بنجاح\', status: \'success\' })'])
                                        ->icon('heroicon-o-clipboard-document'),
                                    Action::make('cancel')
                                        ->label('إلغاء')
                                        ->color('secondary')
                                        ->extraAttributes(['x-on:click' => '$dispatch(\'close\')'])
                                ])
                                ->extraAttributes(['class' => 'w-full']),
                            
                            // Add WhatsApp Button - without phone number field
                            Forms\Components\Actions\Action::make('send_whatsapp')
                                ->label('إرسال عبر واتساب')
                                ->icon('heroicon-o-chat-bubble-left-right')
                                ->form([
                                    Forms\Components\Textarea::make('message')
                                        ->label('الرسالة')
                                        ->required()
                                        ->reactive()
                                        ->default(''),
                                    
                                    Forms\Components\Select::make('insert_placeholder')
                                        ->label('إضافة معلومات للرسالة')
                                        ->options(function ($get, $set, $record) {
                                            if (!$record) return [];
                                            
                                            return [
                                                'client_name' => 'اسم العميل: ' . $record->first_name . ' ' . $record->last_name,
                                                'product_name' => 'اسم المنتج: ' . $record->product->name,
                                                'address' => 'العنوان: ' . $record->street_address,
                                                'phone' => 'رقم الهاتف: ' . $record->phone,
                                                'color' => 'اللون: ' . $record->color,
                                                'total' => 'المجموع: ' . $record->total,
                                            ];
                                        })
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $set, $get, $livewire) {
                                            $currentMessage = $get('message');
                                            $record = $livewire->getRecord();
                                            
                                            if (!$record || !$state) return;
                                            
                                            // Get the appropriate value based on the selection
                                            $value = match($state) {
                                                'client_name' => $record->first_name . ' ' . $record->last_name,
                                                'product_name' => $record->product->name,
                                                'address' => $record->street_address,
                                                'phone' => $record->phone,
                                                'color' => $record->color,
                                                'total' => $record->total,
                                                default => '',
                                            };
                                            
                                            // Append the selected value to the message
                                            $newMessage = $currentMessage . ($currentMessage ? ' ' : '') . $value;
                                            $set('message', $newMessage);
                                            
                                            // Reset the select
                                            $set('insert_placeholder', null);
                                        }),
                                ])
                                ->action(function ($record, array $data) {
                                    $encodedMessage = urlencode($data['message']);
                                    $phoneNumber = preg_replace('/[^0-9]/', '', $record->phone);
                                    $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";

                                    return redirect()->away($whatsappUrl);
                                })
                                ->extraAttributes(['class' => 'w-full']),
                                                            

                        ])->columnSpanFull(),
                    ])
                    ->hidden(fn ($record) => !$record),
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('رقم الطلب')->searchable(),
                Tables\Columns\TextColumn::make('product.name')->label('المنتج')->searchable(),
                Tables\Columns\TextColumn::make('first_name')->label('الاسم الأول')->searchable(),
                Tables\Columns\TextColumn::make('total')->label('المجموع')->money('L.E')->sortable(),
                Tables\Columns\TextColumn::make('selected_colors')
                    ->label('اللون\الرائحة')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        $colored = json_decode($state, true);
                        if (!is_array($colored)) {
                            return $state; // Fallback
                        }
                        $result = '';
                        foreach ($colored as $color) {
                            $result .= $color['color'] . ' (' . $color['quantity'] . ') ';
                        }
                        return trim($result);
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'قيد الانتظار',
                        'processing' => 'تحت المراجعة',
                        'completed' => 'مكتمل',
                        'cancelled' => 'ملغية',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->timezone('Africa/Cairo')
                    ->dateTime()
                    ->sortable(),
        
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'processing' => 'تحت المعالجة',
                        'completed' => 'مكتملة',
                        'cancelled' => 'ملغية',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('من تاريخ'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('إلى تاريخ'),
                    ])
                    ->query(function ($query, array $data): mixed {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn($query) => $query->whereDate('created_at', '>=', $data['created_from']),
                            )
                            ->when(
                                $data['created_until'],
                                fn($query) => $query->whereDate('created_at', '<=', $data['created_until']),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف جماعي'),
                    Tables\Actions\BulkAction::make('updateStatus')
                        ->label('تغيير الحالة')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Select::make('status')
                                ->label('الحالة')
                                ->options([
                                    'pending' => 'قيد الانتظار',
                                    'processing' => 'تحت المعالجة',
                                    'completed' => 'مكتملة',
                                    'cancelled' => 'ملغية',
                                ])
                                ->required(),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each(function ($record) use ($data): void {
                                $record->update(['status' => $data['status']]);
                            });
                        })
                        ->deselectRecordsAfterCompletion()
                        ->successNotification(
                            notification: Notification::make()
                                ->success()
                                ->title('تم تحديث الحالة')
                                ->body('تم تحديث حالة الطلبات المحددة بنجاح'),
                        ),
                ]),
            ]);
    }
    
    
public function getReadableColors($state)
{
    $colors = json_decode($state, true);
    $result = '';
    foreach ($colors as $color) {
        $result .= $color['color'] . ' (' . $color['quantity'] . ') ';
    }
    return trim($result);
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
