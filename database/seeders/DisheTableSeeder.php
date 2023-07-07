<?php

namespace Database\Seeders;

use App\Models\Dishe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DisheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishe_data = config("db.dishes");

        foreach ($dishe_data as $dishe_item) {
            $dishe = new Dishe();
            $dishe->restaurant_id = $dishe_item["restaurant_id"];
            $dishe->name = $dishe_item["name"];
            $dishe->price = $faker->randomFloat(2, 10, 30);;
            $dishe->description = $dishe_item["description"];
            $dishe->visibility = $dishe_item["visibility"];
            $dishe->image = $dishe_item["image"];
            $dishe->save();
        }
    }
}
