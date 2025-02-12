<?php

namespace Database\Seeders;

use App\Models\Items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{

    public function run(): void
    {
        $item = new Items();
        $item->name = "Milk";
        $item->save();

        $item = new Items();
        $item->name = "Potatoes";
        $item->save();

        $item = new Items();
        $item->name = "Apples";
        $item->save();

        $item = new Items();
        $item->name = "Eggs";
        $item->save();

        $item = new Items();
        $item->name = "Yogurt";
        $item->save();

        $item = new Items();
        $item->name = "Pepper";
        $item->save();
    }
}