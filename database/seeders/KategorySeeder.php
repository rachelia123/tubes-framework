<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategorys')->insert([
            [
                'code' => 'D',
                'name' => 'Drink',
                'description' => 'Drink'
            ],
            [
                'code' => 'F',
                'name' => 'Food',
                'description' => 'Food'
            ],
        ]);

    }
}
