<?php

namespace App\Observers;

use App\Models\Recipe;

class RecipeObserver
{
    /**
     * Handle the Recipe "creating" event.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return void
     */
    public function creating(Recipe $recipe)
    {
        $recipe->user()->associate(auth()->user());
    }
}
