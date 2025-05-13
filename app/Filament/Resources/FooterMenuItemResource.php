<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterMenuItemResource\Pages;
use App\Models\FooterMenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FooterMenuItemResource extends Resource
{
    protected static ?string $model = FooterMenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'Website Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('section')
                    ->options([
                        'customer_service' => 'روابط سريعة',
                        'orders_return' => 'الاقسام',
                        'best_sellers' => 'الأكثر مبيعا',
                    ])
                    ,
                Forms\Components\TextInput::make('title')
                    
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('section')
                    ->options([
                        'customer_service' => 'Customer Service',
                        'orders_return' => 'Orders & Return',
                    ]),
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
            'index' => Pages\ListFooterMenuItems::route('/'),
            'create' => Pages\CreateFooterMenuItem::route('/create'),
            'edit' => Pages\EditFooterMenuItem::route('/{record}/edit'),
        ];
    }
}