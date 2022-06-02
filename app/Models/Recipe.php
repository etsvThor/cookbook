<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'cooking time',
        'people',
        'method',
    ];

    protected $casts = [
        'ingredients' => 'array',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
