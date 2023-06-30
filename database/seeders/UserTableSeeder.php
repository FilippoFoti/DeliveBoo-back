<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i=0; $i<10; $i++) {
            $user= new User();
            $user->name = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->email = $faker->email();
            $user->password = '$2y$10$2BtIePDjiyiUnBMBz7yJvu6lv0dSxacTfaNQhEnMq.hoFIe2SvuG2';
            $user->save();
        }
    }
}
