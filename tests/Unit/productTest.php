<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testGetAllProductsOk(): void
    {
        // Creamos un producto de prueba en la base de datos
        $product = Product::factory()->create();

        // Hacemos una petición GET al endpoint de productos
        $response = $this->get('/api/products');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que los datos de la respuesta contienen el producto que hemos creado
        $response->assertJsonFragment($product->toArray());
    }
}
