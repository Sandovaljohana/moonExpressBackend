<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'provider_id' => \App\Models\Provider::factory(),
            'product_id' => \App\Models\Product::factory(),
            'destinationAdress' => $this->faker->address,
            'serviceStatus' => $this->faker->randomElement(['pending', 'in progress', 'completed']),
            'payment' => $this->faker->randomElement(['cash', 'credit card', 'paypal']),
        ];
    }
}