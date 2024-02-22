<?php

namespace Tests\Unit;

use App\Models\User;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase

{
    use RefreshDatabase, WithoutMiddleware;

    public function testGetAllUsersOk(): void
    {
        
        // Creamos un producto de prueba en la base de datos
        $user = User::factory()->create();

        // Hacemos una petición GET al endpoint de productos
        $response = $this->get('/api/users');

        // Comprobamos que la respuesta tiene un código de estado 200
        $response->assertStatus(200);

        // Comprobamos que los datos de la respuesta contienen el producto que hemos creado
        $response->assertJsonFragment($user->toArray());
    }
}
