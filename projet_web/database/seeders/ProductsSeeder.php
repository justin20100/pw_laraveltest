<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'livre 1',
            'slug'=>'livre-1'
        ]);
        DB::table('products')->insert([
            'name'=>'livre 2',
            'slug'=>'livre-2'
        ]);
        DB::table('products')->insert([
            'name'=>'livre 3',
            'slug'=>'livre-3'
        ]);
    }
}
