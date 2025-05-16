<?php

namespace Tests\Feature;

use App\Models\EspacoCafe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EspacoCafeApiTest extends TestCase
{
    // use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }

    public function test_list_cafes_requires_authentication()
    {
        $response = $this->getJson('/api/cafes');
        $response->assertStatus(401);
    }

    public function test_list_cafes_returns_data_when_authenticated()
    {
        $this->authenticate();

        EspacoCafe::factory()->count(3)->create();

        $response = $this->getJson('/api/cafes');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_create_cafe()
    {
        $this->authenticate();

        $data = [
            'nome' => 'Espaço Café A',
            'lotacao' => '50',
        ];

        $response = $this->postJson('/api/cafes', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('espaco_cafes', $data);
    }

    public function test_show_cafe()
    {
        $this->authenticate();

        $cafe = EspacoCafe::factory()->create();

        $response = $this->getJson("/api/cafes/{$cafe->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'nome' => $cafe->nome,
                     'lotacao' => $cafe->lotacao,
                 ]);
    }

    public function test_update_cafe()
    {
        $this->authenticate();

        $cafe = EspacoCafe::factory()->create();

        $updateData = [
            'nome' => 'Espaço Atualizado',
            'lotacao' => '120',
        ];

        $response = $this->putJson("/api/cafes/{$cafe->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('espaco_cafes', $updateData);
    }

    public function test_delete_cafe()
    {
        $this->authenticate();

        $cafe = EspacoCafe::factory()->create();

        $response = $this->deleteJson("/api/cafes/{$cafe->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('espaco_cafes', ['id' => $cafe->id]);
    }
}
