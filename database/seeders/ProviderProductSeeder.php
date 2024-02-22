<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProviderProduct;
use App\Models\Provider;
use App\Models\Product;

class ProviderProductSeeder extends Seeder
{
    public function run()
    {
        $providers = Provider::all();
        $products = Product::all();

        foreach ($providers as $provider) {
            foreach ($products as $product) {
                ProviderProduct::factory()->create([
                    'provider_id' => $provider->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
