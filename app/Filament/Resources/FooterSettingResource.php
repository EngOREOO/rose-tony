<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingResource\Pages;
use App\Models\FooterSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FooterSettingResource extends Resource
{
    protected static ?string $model = FooterSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Company Information')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('logo')
                            ->collection('logo')
                            ->image()
                            ,
                        Forms\Components\Textarea::make('about_text')
                            
                            ->maxLength(500),
                        Forms\Components\TextInput::make('working_hours_weekday')
                            ->label('Weekday Working Hours')
                            
                            ->placeholder('e.g. Mon-Fri: 8am - 9pm'),
                        Forms\Components\TextInput::make('working_hours_weekend')
                            ->label('Weekend Working Hours')
                            
                            ->placeholder('e.g. Sat-Sun: 8am - 9pm'),
                    ])->columns(2),

                Forms\Components\Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url(),
                        Forms\Components\TextInput::make('twitter_url')
                            ->label('Twitter URL')
                            ->url(),
                        Forms\Components\TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url(),
                        Forms\Components\TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url(),
                    ])->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ,
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ,
                        Forms\Components\TextInput::make('address')
                            
                            ->maxLength(255),
                    ])->columns(2),

                // Forms\Components\Section::make('App Store')
                //     ->schema([
                //         Forms\Components\TextInput::make('app_store_url')
                //             ->label('App Store URL')
                //             ->url()
                //             ,
                //         Forms\Components\SpatieMediaLibraryFileUpload::make('app_store_image')
                //             ->collection('app_store_image')
                //             ->image()
                //             ,
                //     ])->columns(2),

                Forms\Components\Section::make('Payment Information')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('payment_cards')
                            ->collection('payment_cards')
                            ->image()
                            ,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSetting::route('/create'),
            'edit' => Pages\EditFooterSetting::route('/{record}/edit'),
        ];
    }
}