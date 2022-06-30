<?php

namespace App\Models;

use App\Enums\UnitTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'type_other',
        'amount',
    ];

    protected $casts = [
        'unit' => UnitTypes::class,
    ];
}
