<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $name = $i > 0 ? strtolower($faker->name()) : 'Vincent justin';
            $is_admin = $i > 0 ? false : true;
            $slug = Str::slug($name);
            $avatar = $faker->imageUrl(128, 128, true, 'people', $name);
            $email = $i > 0 ? $faker->unique()->safeEmail : 'justin.vincent@student.hepl.be';
            $password = bcrypt('change_this');
            DB::table('users')
                ->insert(
                    compact('name','is_admin', 'slug', 'avatar', 'email', 'password')
                );
        }
    }
}
