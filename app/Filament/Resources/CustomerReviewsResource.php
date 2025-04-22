<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerReviewsResource\Pages;
use App\Filament\Resources\CustomerReviewsResource\RelationManagers;
use App\Models\CustomerReviews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerReviewsResource extends Resource
{
    protected static ?string $model = CustomerReviews::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'نظام التحكم بالمحتوي';
    protected static ?string $modelLabel = 'اراء العملاء';
    protected static ?string $pluralModelLabel = 'اراء العملاء';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Customer Name')
                ->required(),
            Forms\Components\Select::make('rate')
                ->label('Rate (1-5 stars)')
                ->options([
                    1 => '1 Star',
                    2 => '2 Stars',
                    3 => '3 Stars',
                    4 => '4 Stars',
                    5 => '5 Stars',
                ])
                ->required(),
            Forms\Components\Textarea::make('rating_text')
                ->label('Review Text')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')->limit(50),
            Tables\Columns\TextColumn::make('rate')->limit(50),
            Tables\Columns\TextColumn::make('rating_text')->limit(50),
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
            'index' => Pages\ListCustomerReviews::route('/'),
            'create' => Pages\CreateCustomerReviews::route('/create'),
            'edit' => Pages\EditCustomerReviews::route('/{record}/edit'),
        ];
    }
}
