<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subkategorys')->insert([
            [
                'code' => 'C',
                'name' => 'Coffe Based',
                'description' => 'Coffe Based'
            ],
            [
                'code' => 'M',
                'name' => 'Milk Based',
                'description' => 'Milk Based'
            ],
            [
                'code' => 'MC',
                'name' => 'Mocktail',
                'description' => 'Mocktail'
            ],
            [
                'code' => 'T',
                'name' => 'Tea Based',
                'description' => 'Tea Based'
            ],
            [
                'code' => 'MB',
                'name' => 'Manual Brew',
                'description' => 'Mocktail'
            ],
            [
                'code' => 'SK',
                'name' => 'Snack',
                'description' => 'Snack'
            ],
        ]);
    }
}
