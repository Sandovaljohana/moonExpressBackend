<?php

namespace Tests\Unit;
use App\Http\Controllers\Api\ProductController;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testGetAllProductsOk(): void
    {
        $productController = new ProductController(); //creamos el escenario

        $ExpectedResponse = [
            201,
            [
                'id' => 1,
                'name' => "Agua",
                'description' => "Deliciosa agua de luna",
                'price' => 20.99,
                'created_at' => null,
                'updated_at' => null
            ]
        ];
        $response = $productController->index(); //ejecuta el escenario
        self::assertEquals($ExpectedResponse, $response); // compueba el escenario
    
        
    }
}
