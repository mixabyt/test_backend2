<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('markups')->insert([
            ['price_from' => 10,   'price_to' => 50,   'percent' => 500],
            ['price_from' => 51,   'price_to' => 100,  'percent' => 300],
            ['price_from' => 101,  'price_to' => 200,  'percent' => 200],
            ['price_from' => 201,  'price_to' => 400,  'percent' => 150],
            ['price_from' => 401,  'price_to' => 700,  'percent' => 100],
            ['price_from' => 701,  'price_to' => 1000, 'percent' => 50],
        ]);
    }
}
