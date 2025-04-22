<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductReviewResource\Pages;
use App\Models\ProductReview;
use Filament\Forms;
use Filament\Forms\Form; // ✅ Correct namespace
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\Select;

class ProductReviewResource extends Resource
{
    protected static ?string $model = ProductReview::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('comment')
                    ->required(),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5),
                Select::make('status')
                    ->options(ProductReview::getStatuses())
                    ->required(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Reviewer')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('rating')
                    ->sortable(),
                TextColumn::make('comment')
                    ->limit(50),
                SelectColumn::make('status')
                    ->options(ProductReview::getStatuses())
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(ProductReview::getStatuses()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->action(fn (ProductReview $record) => $record->update(['status' => 'approved']))
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-s-check')
                    ->visible(fn (ProductReview $record) => $record->status === 'pending'),
                Tables\Actions\Action::make('reject')
                    ->action(fn (ProductReview $record) => $record->update(['status' => 'rejected']))
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-s-x-mark')
                    ->visible(fn (ProductReview $record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('approve')
                    ->action(fn (Builder $query) => $query->update(['status' => 'approved']))
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-s-check')
                    ->deselectRecordsAfterCompletion(),
                Tables\Actions\BulkAction::make('reject')
                    ->action(fn (Builder $query) => $query->update(['status' => 'rejected']))
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-s-x-mark')
                    ->deselectRecordsAfterCompletion(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductReviews::route('/'),
            'create' => Pages\CreateProductReview::route('/create'),
            'view' => Pages\ViewProductReview::route('/{record}'),
            'edit' => Pages\EditProductReview::route('/{record}/edit'),
        ];
    }
}