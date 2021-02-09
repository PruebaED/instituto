<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use App\Models\Centro;

class CentroCoordinadorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CentroCoordinador()
    {

        $response = $this->get('api/miCentro');
        $response->assertStatus(302);

        Sanctum::actingAs(
            User::factory()
            ->has(Centro::factory(),'centroCoordinado')
            ->create()
        );

        $response = $this->get('/api/miCentro');

        $response->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonStructure(['data' => ['codigo', 'nombre', 'coordinador' => ['email']]]);
    }
}
