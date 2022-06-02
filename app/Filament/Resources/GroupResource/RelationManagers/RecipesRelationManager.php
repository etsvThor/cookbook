<?php

namespace App\Filament\Resources\GroupResource\RelationManagers;

use App\Filament\Resources\RecipeResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class RecipesRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'recipes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return RecipeResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return RecipeResource::table($table);
    }
}
