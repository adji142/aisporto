<?php

namespace Database\Seeders;

use App\Models\HighlightProduct;
use Illuminate\Database\Seeder;

class HighlightProductSeeder extends Seeder
{
    public function run(): void
    {
        HighlightProduct::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Produk Unggulan Kami',
                'slug' => 'produk-unggulan',
                'short_description' => 'Produk ini adalah produk unggulan yang kami rekomendasikan.',
                'description' => 'Deskripsi lengkap produk unggulan.',
                'price' => 0,
            ]
        );
    }
}

