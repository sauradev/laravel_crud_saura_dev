<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(\App\Category::class, 20)->create();
    }
}
