<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'image' => 'products/botol-plastik.jpg',
                'name' => 'Botol Plastik',
                'description' => 'Botol minuman sekali pakai berbahan plastik PET',
                'weight' => 0.02,
                'price' => 500,
                'stock' => 1000,
                'gram' => 20,
                'categoryId' => 1, // contoh kategori recycle
                'userId' => 1,
            ],
            [
                'image' => 'products/kaleng-minuman.jpg',
                'name' => 'Kaleng Minuman',
                'description' => 'Kaleng bekas minuman berbahan alumunium',
                'weight' => 0.015,
                'price' => 1000,
                'stock' => 800,
                'gram' => 15,
                'categoryId' => 2,
                'userId' => 3,
            ],
            [
                'image' => 'products/hp-rusak.jpg',
                'name' => 'Handphone Rusak',
                'description' => 'Perangkat elektronik bekas tidak berfungsi',
                'weight' => 0.3,
                'price' => 25000,
                'stock' => 50,
                'gram' => 300,
                'categoryId' => 1,
                'userId' => 1,
            ],
            [
                'image' => 'products/sisa-sayuran.jpg',
                'name' => 'Sisa Sayuran',
                'description' => 'Limbah organik dari dapur seperti sayur busuk',
                'weight' => 1.0,
                'price' => 2000,
                'stock' => 200,
                'gram' => 1000,
                'categoryId' => 2,
                'userId' => 3,
            ],
            [
                'image' => 'products/kertas-koran.jpg',
                'name' => 'Kertas Koran',
                'description' => 'Koran bekas untuk daur ulang kertas',
                'weight' => 0.5,
                'price' => 4000,
                'stock' => 300,
                'gram' => 500,
                'categoryId' => 1,
                'userId' => 1,
            ],
            [
                'image' => 'products/botol-kaca.jpg',
                'name' => 'Botol Kaca',
                'description' => 'Botol bekas berbahan kaca bening',
                'weight' => 0.6,
                'price' => 3000,
                'stock' => 250,
                'gram' => 600,
                'categoryId' => 2,
                'userId' => 3,
            ],
            [
                'image' => 'products/pakaian-bekas.jpg',
                'name' => 'Pakaian Bekas',
                'description' => 'Tekstil pakaian yang sudah tidak terpakai',
                'weight' => 1.2,
                'price' => 10000,
                'stock' => 150,
                'gram' => 1200,
                'categoryId' => 1,
                'userId' => 1,
            ],
            [
                'image' => 'products/baterai-bekas.jpg',
                'name' => 'Baterai Bekas',
                'description' => 'Baterai sekali pakai dan rechargeable yang sudah habis',
                'weight' => 0.05,
                'price' => 5000,
                'stock' => 500,
                'gram' => 50,
                'categoryId' => 2,
                'userId' => 3,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
