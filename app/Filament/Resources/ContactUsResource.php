<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'تواصل معنا';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->columnSpanFull()
                ->label('Contact Image'),
            Forms\Components\Textarea::make('address')
                ->label('Address')
                ->rows(3)
                ->required(),
            Forms\Components\Textarea::make('phone')
                ->label('Phone Numbers')
                ->rows(3)
                ->required(),
            Forms\Components\Textarea::make('email')
                ->label('Emails')
                ->rows(3)
                ->required(),
            Forms\Components\TextInput::make('map_url')
                ->label('Google Map URL')
                ->url()
                ->nullable(),
            Forms\Components\TextInput::make('contact_head')
                ->label('Contact Head')
                ->required(),
            Forms\Components\Textarea::make('contact_paragraph')
                ->label('Contact Paragraph')
                ->required(),
            Forms\Components\TextInput::make('contact_button_text')
                ->label('Contact Button Text')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('address')->limit(50),
            Tables\Columns\TextColumn::make('phone')->limit(50),
            Tables\Columns\TextColumn::make('email')->limit(50),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactUs::route('/'),
            'create' => Pages\CreateContactUs::route('/create'),
            'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
