<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductContents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $locales = [
            'en' => 'en_US',
            'uk' => 'uk_UA',
        ];
        Product::factory()->count(50000)->create()->each(function (Product $product) use ($locales) {
            foreach ($locales as $locale => $localeCode) {
                ProductContents::factory()->create([
                    'product_id' => $product->id,
                    'locale' => $locale,
                    'name' => fake($localeCode)->words(1, true),
                ]);
            }
        });
    }
}
