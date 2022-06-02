<?php

namespace App\Filament\Resources\RecipeResource\RelationManagers;

use App\Filament\Resources\GroupResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class GroupsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'groups';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return GroupResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return GroupResource::table($table);
    }
}
