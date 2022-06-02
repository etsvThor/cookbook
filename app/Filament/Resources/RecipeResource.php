<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Recipes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('ingredients')
                    ->required(),
                Forms\Components\Textarea::make('method')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('ingredients'),
                Tables\Columns\TextColumn::make('method'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\GroupsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'view' => Pages\ViewRecipe::route('/{record}'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
