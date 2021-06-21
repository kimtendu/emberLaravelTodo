<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mohammed Ali',
            'email' => 'Ali@gmail.com',
            'password' => Hash::make('123454321'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bill Gates',
            'email' => 'billi@gmail.com',
            'password' => Hash::make('123454321'),
        ]);
        DB::table('users')->insert([
            'name' => 'Donald Tramp',
            'email' => 'tramp@gmail.com',
            'password' => Hash::make('123454321'),
        ]);

    }
}
