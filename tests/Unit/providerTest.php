<?php

namespace Tests\Unit;


use App\Models\Provider;
use App\Http\Controllers\Api\ProviderController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
class ProviderTest extends TestCase

{
    use RefreshDatabase, WithoutMiddleware;

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
}
