<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'LARAVEL Y LIVEWIRE',
            'cost' => 200,
            'price' => 350,
            'barcode' => '750100525',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png',
        ]);
        Product::create([
            'name' => 'RUNNING NIKE',
            'cost' => 600,
            'price' => 1500,
            'barcode' => '750100524',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png',
        ]);
        Product::create([
            'name' => 'IPHONE 11',
            'cost' => 900,
            'price' => 1400,
            'barcode' => '750100523',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 3,
            'image' => 'curso.png',
        ]);
        Product::create([
            'name' => 'PC GAMER',
            'cost' => 790,
            'price' => 1350,
            'barcode' => '750100522',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 4,
            'image' => 'curso.png',
        ]);
    }
}
