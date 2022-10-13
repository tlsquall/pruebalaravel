<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => '1',
            'lvl' => 0,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$RAMQBFU3SrCTsLYZj3tAa.X4c4znsHmIVLiFCGfDVg.NOudkjDDQO',
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'lvl' => 1,
            'name' => 'Pedro Perez',
            'email' => 'hola@hola.com',
            'password' => '$2y$10$RAMQBFU3SrCTsLYZj3tAa.X4c4znsHmIVLiFCGfDVg.NOudkjDDQO',
        ]);
    }
}
