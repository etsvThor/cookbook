<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use App\Models\Unit;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Recipes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'user.name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\SpatieMediaLibraryFileUpload::make('image')->collection('img'),

                Forms\Components\TextInput::make('people')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->helperText('For how many people/portions is the list of ingredients'),

                Forms\Components\TimePicker::make('cooking time'),

                Forms\Components\Repeater::make('ingredients')
                    ->required()
                    ->schema([
                        Forms\Components\TextInput::make('ingredient')
                            ->required(),
                        Forms\Components\Select::make('unit')
                            ->options([
                                ...Unit::pluck('name')->toArray(),
                                'other' => 'Other',
                            ])
                            ->reactive(),
                        Forms\Components\TextInput::make('other_unit')
                            ->hidden(fn (Closure $get) => $get('unit') != 'other'),
                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->minValue(0)
                    ]),

                Forms\Components\MarkdownEditor::make('description')
                    ->required()
                    ->maxLength(65535),

                Forms\Components\MarkdownEditor::make('method')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                TrashedFilter::make('is_trashed'),
                SelectFilter::make('user')
                    ->relationship('user', 'name'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
