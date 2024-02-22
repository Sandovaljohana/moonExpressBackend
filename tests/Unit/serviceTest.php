<?php

namespace Tests\Unit;
use App\Models\Service;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class serviceTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

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
}