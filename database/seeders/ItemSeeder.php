<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'item_category_id' => 1,
            'name' => Str::random(20),
            'price' => floatval(5),
            'description' => Str::words(200),
            'image' => Str::words(200).'.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
