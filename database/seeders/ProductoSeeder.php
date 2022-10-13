<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'id' => '1',
            'nombre' => 'Leche',
            'precio' => '100.00',
            'impuesto' => '12.00'
        ]);
        DB::table('productos')->insert([
            'id' => '2',
            'nombre' => 'Carne',
            'precio' => '50.00',
            'impuesto' => '10.00'
        ]);
    }
}
