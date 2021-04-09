<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category();
        $category->name = 'Iced Mocha';
        $category->save();

        $category = new Category();
        $category->name = 'Espresso';
        $category->save();

        $category = new Category();
        $category->name = 'Cappuccino';
        $category->save();

        $category = new Category();
        $category->name = 'Cafe Mocha';
        $category->save();
    }
}
