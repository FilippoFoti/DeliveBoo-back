<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = Restaurant::find(1);
        $type = Type::find(2);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(2);
        $type = Type::find(2);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(3);
        $type = Type::find(2);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(4);
        $type = Type::find(3);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(5);
        $type = Type::find(4);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(6);
        $type = Type::find(5);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(7);
        $type = Type::find(1);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(8);
        $type = Type::find(1);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(9);
        $type = Type::find(4);
        $restaurant->types()->attach($type);

        $restaurant = Restaurant::find(10);
        $type = Type::find(4);
        $restaurant->types()->attach($type);
    }
}
