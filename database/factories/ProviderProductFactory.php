<?php

namespace Database\Factories;

use App\Models\ProviderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderProductFactory extends Factory
{
    protected $model = ProviderProduct::class;

    public function definition()
    {
        return [
            'provider_id' => \App\Models\Provider::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
