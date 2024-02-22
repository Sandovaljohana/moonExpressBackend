<?php

namespace Tests\Unit;

use App\Models\User;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase

{
    use RefreshDatabase, WithoutMiddleware, WithFaker;

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

    
    public function testStore()
    {
        $userData = [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phoneNumber' => $this->faker->phoneNumber,
        ];

        $response = $this->post('/api/users', $userData);

        $response->assertStatus(201)
            ->assertJsonFragment($userData);
    }

    public function testShow()
{
    $user = User::factory()->create();

    $response = $this->get('/api/users/' . $user->id);

    $response->assertStatus(200)
        ->assertJsonFragment([
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'phoneNumber' => $user->phoneNumber,
        ]);
}

public function testUpdate()
{
    $user = User::factory()->create();

    $userData = [
        'name' => $this->faker->name,
        'lastname' => $this->faker->lastName,
        'email' => $this->faker->unique()->safeEmail,
        'phoneNumber' => $this->faker->phoneNumber,
    ];

    $response = $this->put('/api/users/' . $user->id, $userData);

    $response->assertStatus(200)
        ->assertJsonFragment($userData);
}




}