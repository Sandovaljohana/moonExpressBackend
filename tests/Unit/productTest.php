<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware, WithFaker;

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

    public function testStore()
{
    $productData = [
        'name' => $this->faker->word,
        'description' => $this->faker->sentence,
        'price' => $this->faker->randomFloat(2, 1, 100),
    ];

    $response = $this->post('/api/products', $productData);

    $response->assertStatus(201)
        ->assertJsonFragment($productData);
}

public function testShow()
{
    $product = Product::factory()->create();

    $response = $this->get('/api/products/' . $product->id);

    $response->assertStatus(200)
        ->assertJsonFragment([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
        ]);
}

public function testUpdate()
{
    $product = Product::factory()->create();

    $productData = [
        'name' => $this->faker->word,
        'description' => $this->faker->sentence,
        'price' => $this->faker->randomFloat(2, 1, 100),
    ];

    $response = $this->put('/api/products/' . $product->id, $productData);

    $response->assertStatus(200)
        ->assertJsonFragment($productData);
}

public function testDestroy()
{
    $product = Product::factory()->create();

    $response = $this->delete('/api/products/' . $product->id);

    $response->assertStatus(204);

    $this->assertDatabaseMissing('products', ['id' => $product->id]);
}



}
