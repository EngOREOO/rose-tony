<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqHelpSectionResource\Pages;
use App\Filament\Resources\FaqHelpSectionResource\RelationManagers;
use App\Models\FaqHelpSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqHelpSectionResource extends Resource
{
    protected static ?string $model = FaqHelpSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'نظام التحكم بالمحتوي';
    protected static ?string $modelLabel = ' محتوى قسم المساعدة';
    protected static ?string $pluralModelLabel = 'محتوى قسم المساعدة';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('عنوان القسم')->required(),
                Textarea::make('description')->label('الوصف الأساسي')->rows(4),
                Textarea::make('notice')->label('ملاحظة (المدة الزمنية مثلاً)')->rows(3),
                TextInput::make('form_title')->label('عنوان الفورم'),
                TextInput::make('button_text')->label('نص زر الإرسال'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('العنوان'),
            Tables\Columns\TextColumn::make('form_title')->label('عنوان الفورم'),
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
            'index' => Pages\ListFaqHelpSections::route('/'),
            'create' => Pages\CreateFaqHelpSection::route('/create'),
            'edit' => Pages\EditFaqHelpSection::route('/{record}/edit'),
        ];
    }
}
