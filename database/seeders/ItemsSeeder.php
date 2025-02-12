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
    }
}