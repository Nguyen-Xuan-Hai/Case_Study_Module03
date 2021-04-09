<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Product();
        $category->name = 'Brandy Coffee';
        $category->description = 'Xuat xu Nga';
        $category->img = 'asdfas1234dsfc32';
        $category->price = '1000$';
        $category->category_id = 1 ;
        $category->save();

        $category = new Product();
        $category->name = 'Australian Coffee';
        $category->description = 'Xuat xu Australian';
        $category->img = 'dwf4123gef3';
        $category->price = '500$';
        $category->category_id = 2 ;
        $category->save();
    }
}
