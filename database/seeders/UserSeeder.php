<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'middle_name' => Str::random(10),
            'last_name' => Str::random(10),
            'user_name' => Str::random(10),
            'address' => Str::random(10),
            'user_type' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'is_active' => 'active',
            'phone' => Str::random(10),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
