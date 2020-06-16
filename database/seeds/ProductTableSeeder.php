<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<=20;$i++){
            DB::table('products')->insert([
                'name'=>'product'.$i,
                'category_id'=>random_int(1,3),
                'desc'=>'product'.$i.'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'img'=>'products/dress.png',
                'price'=>random_int(100,1000)
            ]);
        }
    }
}
