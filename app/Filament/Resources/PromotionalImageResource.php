<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionalImageResource\Pages;
use App\Models\PromotionalImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PromotionalImageResource extends Resource
{
    protected static ?string $model = PromotionalImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'صور ترويجية';
    protected static ?string $navigationGroup = 'المتجر';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('promotional_image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('promotional-images')
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('title')
                //     ->label('العنوان')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('subtitle')
                //     ->label('العنوان الفرعي')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('button_text')
                //     ->label('نص الزر')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('button_link')
                //     ->label('رابط الزر')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('discount_percentage')
                //     ->label('نسبة الخصم')
                //     ->numeric()
                //     ->minValue(0)
                //     ->maxValue(100),
                // Forms\Components\Toggle::make('is_active')
                //     ->label('مفعل')
                //     ->default(true),
                // Forms\Components\TextInput::make('sort_order')
                //     ->label('ترتيب العرض')
                //     ->numeric()
                //     ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('promotional_image')
                    ->disk('public')
                    ->label('الصورة'),
                // Tables\Columns\TextColumn::make('title')
                //     ->label('العنوان')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('discount_percentage')
                //     ->label('نسبة الخصم')
                //     ->suffix('%'),
                // Tables\Columns\IconColumn::make('is_active')
                //     ->label('مفعل')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('sort_order')
                //     ->label('ترتيب العرض')
                //     ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                //
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
            'index' => Pages\ListPromotionalImages::route('/'),
            'create' => Pages\CreatePromotionalImage::route('/create'),
            'edit' => Pages\EditPromotionalImage::route('/{record}/edit'),
        ];
    }    
}