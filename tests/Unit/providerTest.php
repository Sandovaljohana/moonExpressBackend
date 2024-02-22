<?php

namespace Tests\Unit;


use App\Models\Provider;
use App\Http\Controllers\Api\ProviderController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;



class ProviderTest extends TestCase

{
    use RefreshDatabase, WithoutMiddleware, WithFaker;

    public function testGetAllProvidersOk(): void
    {
        
        // Creamos un producto de prueba en la base de datos
        $provider = Provider::factory()->create();

        // Hacemos una petición GET al endpoint de productos
        $response = $this->get('/api/providers');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que los datos de la respuesta contienen el producto que hemos creado
        $response->assertJsonFragment($provider->toArray());
    }

    public function testStore()
{
    $providerData = [
        'name' => $this->faker->company,
        'products' => $this->faker->word,
        'phoneNumber' => $this->faker->phoneNumber,
    ];

    $response = $this->post('/api/providers', $providerData);

    $response->assertStatus(201)
        ->assertJsonFragment($providerData);
}

public function testShow()
{
    $provider = Provider::factory()->create();

    $response = $this->get('/api/providers/' . $provider->id);

    $response->assertStatus(200)
        ->assertJsonFragment([
            'name' => $provider->name,
            'products' => $provider->products,
            'phoneNumber' => $provider->phoneNumber,
        ]);
}

public function testUpdate()
{
    $provider = Provider::factory()->create();

    $providerData = [
        'name' => $this->faker->company,
        'products' => $this->faker->word,
        'phoneNumber' => $this->faker->phoneNumber,
    ];

    $response = $this->put('/api/providers/' . $provider->id, $providerData);

    $response->assertStatus(200)
        ->assertJsonFragment($providerData);
}

public function testDestroy()
{
    $provider = Provider::factory()->create();

    $response = $this->delete('/api/providers/' . $provider->id);

    $response->assertStatus(204);

    $this->assertDatabaseMissing('providers', ['id' => $provider->id]);
}

}
