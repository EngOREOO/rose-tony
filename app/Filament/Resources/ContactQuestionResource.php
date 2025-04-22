<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactQuestionResource\Pages;
use App\Models\ContactQuestion;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ContactQuestionResource extends Resource
{
    protected static ?string $model = ContactQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = ' رسائل العملاء';

    protected static ?string $navigationLabel = 'الرسائل الواردة';
    protected static ?string $pluralModelLabel = 'الرسائل الواردة';
    protected static ?string $modelLabel = 'رسالة';

    public static function form(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\TextInput::make('name')
                ->label('الاسم')
                ->required() // تم إضافة required لتمكين التعديل إذا لزم الأمر
                ->disabled(false), // تم إزالة خاصية الـ disabled

            \Filament\Forms\Components\TextInput::make('email')
                ->label('البريد الإلكتروني')
                ->required() // تم إضافة required
                ->disabled(false), // تم إزالة خاصية الـ disabled

            \Filament\Forms\Components\Textarea::make('message')
                ->label('نص الرسالة')
                ->required() // تم إضافة required
                ->disabled(false) // تم إزالة خاصية الـ disabled
                ->rows(10),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('name')->label('الاسم'),
                TextColumn::make('email')->label('البريد الإلكتروني'),
                TextColumn::make('message')->label('الرسالة')->limit(50),
                TextColumn::make('created_at')->label('تاريخ الإرسال')->dateTime('d M Y h:i A'),
            ])
            ->filters([
                // يمكن إضافة فلاتر إذا لزم الأمر
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('عرض'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
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
            'index' => Pages\ListContactQuestions::route('/'),
            'view' => Pages\ViewContactQuestion::route('/{record}'),
        ];
    }
}
