<?php

namespace Database\Seeders;

use App\Enums\UnitTypes;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Especially useful to convert retard units to SI units
     * Values should be in SI units
     * @var array[]
     */
    protected $units = [
        ['Liter', UnitTypes::VOLUME, 0.001],
        ['Tablespoon', UnitTypes::VOLUME, 0.000014787],
        ['Teaspoon', UnitTypes::VOLUME, 0.0000049289],
        ['Milliliter', UnitTypes::VOLUME, 0.000001],
        ['US Cup', UnitTypes::VOLUME, 0.00024],
        ['US Liquid gallon', UnitTypes::VOLUME, 0.00378541],
        ['US Fluid ounce', UnitTypes::VOLUME, 0.000029574],
        ['Pinch', UnitTypes::VOLUME, 0.00000031],
        ['Dash', UnitTypes::VOLUME, 0.00000062],

        ['Kilogram', UnitTypes::MASS, 1000],
        ['Gram', UnitTypes::MASS, 1],
        ['Milligram', UnitTypes::MASS, 0.001],
        ['Pound', UnitTypes::MASS, 453.592],
        ['Ounce', UnitTypes::MASS, 28.3495],

        ['Centimeter', UnitTypes::LENGTH, 0.01],
        ['Inch', UnitTypes::LENGTH, 0.0254],
        ['Foot', UnitTypes::LENGTH, 0.3048],
    ];

    /**
     * Run the database seeds.
     * You can run this seeder again, and it will only create new roles
     *
     * @return void
     */
    public function run()
    {
        // Create each role if it does not exist yet
        foreach ($this->units as $unit) {
            Unit::firstOrCreate([
                'name' => $unit[0],
                'type' => $unit[1]->value,
                'amount' => $unit[2],
            ]);
        }
    }
}
