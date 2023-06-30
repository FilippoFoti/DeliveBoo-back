<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_data = config("db.types");

        foreach ($type_data as $type_item) {
            $type = new Type();
            $type->name = $type_item["name"];
            $type->icon = $type_item["icon"];
            $type->save();
        }
    }
}
