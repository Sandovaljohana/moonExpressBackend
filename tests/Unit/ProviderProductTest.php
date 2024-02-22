<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ProviderProduct;

class ProviderProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_provider_product()
    {
        $providerProduct = ProviderProduct::factory()->make()->toArray();
        $response = $this->post(route('provider-product.store'), $providerProduct);
        $response->assertStatus(201);
    }

    public function test_can_update_provider_product()
    {
        $providerProduct = ProviderProduct::factory()->create();
        $updatedProviderProduct = ProviderProduct::factory()->make()->toArray();
        $response = $this->put(route('provider-product.update', $providerProduct), $updatedProviderProduct);
        $response->assertStatus(200);
    }

    public function test_can_show_provider_product()
    {
        $providerProduct = ProviderProduct::factory()->create();
        $response = $this->get(route('provider-product.show', $providerProduct));
        $response->assertStatus(200);
    }

    public function test_can_delete_provider_product()
    {
        $providerProduct = ProviderProduct::factory()->create();
        $response = $this->delete(route('provider-product.destroy', $providerProduct));
        $response->assertStatus(204);
    }

    public function test_can_list_provider_products()
    {
        $providerProduct = ProviderProduct::factory()->count(5)->create();
        $response = $this->get(route('provider-product.index'));
        $response->assertStatus(200);
    }
}