<?php

namespace Tests\Unit;
use App\Models\Service;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Provider;
use App\Models\Product;


class serviceTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware, WithFaker;

    public function testGetAllServicesOk(): void
    {
        
        // Creamos un producto de prueba en la base de datos
        $service = Service::factory()->create();

        // Hacemos una petición GET al endpoint de productos
        $response = $this->get('/api/services');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que los datos de la respuesta contienen el producto que hemos creado
        $response->assertJsonFragment($service->toArray());
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $provider = Provider::factory()->create();
        $product = Product::factory()->create();
    
        $serviceData = [
            'user_id' => $user->id,
            'provider_id' => $provider->id,
            'product_id' => $product->id,
            'destinationAdress' => $this->faker->address,
            'serviceStatus' => $this->faker->word,
            'payment' => $this->faker->word,
        ];
    
        $response = $this->post('/api/services', $serviceData);
    
        $response->assertStatus(201)
            ->assertJsonFragment($serviceData);
    }

    public function testShow()
{
    $service = Service::factory()->create();

    $response = $this->get('/api/services/' . $service->id);

    $response->assertStatus(200)
        ->assertJsonFragment([
            'user_id' => $service->user_id,
            'provider_id' => $service->provider_id,
            'product_id' => $service->product_id,
            'destinationAdress' => $service->destinationAdress,
            'serviceStatus' => $service->serviceStatus,
            'payment' => $service->payment,
        ]);
}

public function testUpdate()
{
    $service = Service::factory()->create();

    $user = User::factory()->create();
    $provider = Provider::factory()->create();
    $product = Product::factory()->create();

    $serviceData = [
        'user_id' => $user->id,
        'provider_id' => $provider->id,
        'product_id' => $product->id,
        'destinationAdress' => $this->faker->address,
        'serviceStatus' => $this->faker->word,
        'payment' => $this->faker->word,
    ];

    $response = $this->put('/api/services/' . $service->id, $serviceData);

    $response->assertStatus(200)
        ->assertJsonFragment($serviceData);
}

public function testDestroy()
{
    $service = Service::factory()->create();

    $response = $this->delete('/api/services/' . $service->id);

    $response->assertStatus(204);

    $this->assertDatabaseMissing('services', ['id' => $service->id]);
}




}