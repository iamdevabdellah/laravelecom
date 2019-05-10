<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => 'Casual Shirt',
                'product_price' => '100',
                'product_sku' => 'C-10',
                'product_image' => 'pro_image_1.png',
                'product_description' => 'This is a test description'
            ],

            [
                'product_name' => 'Jeans',
                'product_price' => '90',
                'product_sku' => 'J-10',
                'product_image' => 'pro_image_2.png',
                'product_description' => 'This is a test description'
            ],
        ];



        foreach ($products as $key => $value) {
            DB::table('products')->insert([
                $key => $value
            ]);
        }
        
    }
}
