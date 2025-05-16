<?php

namespace Tests\Feature;

use App\Models\SalaTreinamento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalaTreinamentoApiTest extends TestCase
{
    use RefreshDatabase;

    //Autentica para o teste
    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }

    //Testar o Get de Salas sem estar Autenticado
    public function test_list_salas_requires_authentication()
    {
        $response = $this->getJson('/api/salas');
        $response->assertStatus(401);
    }

    //Testar o Get de Salas Autenticado
    public function test_list_salas_returns_data_when_authenticated()
    {
        $this->authenticate();

        SalaTreinamento::factory()->count(3)->create();

        $response = $this->getJson('/api/salas');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    //Testar o POST para criar salas
    public function test_create_sala()
    {
        $this->authenticate();

        $data = [
            'nome' => 'Sala 1',
            'lotacao' => 30,
        ];

        $response = $this->postJson('/api/salas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('sala_treinamentos', $data);
    }

    //Testar o GET de salas pelo $id
    public function test_show_sala()
    {
        $this->authenticate();

        $sala = SalaTreinamento::factory()->create();

        $response = $this->getJson("/api/salas/{$sala->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'nome' => $sala->nome,
                     'lotacao' => $sala->lotacao,
                 ]);
    }

    //Testar o PUT de salas pelo $id
    public function test_update_sala()
    {
        $this->authenticate();

        $sala = SalaTreinamento::factory()->create();

        $updateData = [
            'nome' => 'Sala Atualizada',
            'lotacao' => 50,
        ];

        $response = $this->putJson("/api/salas/{$sala->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('sala_treinamentos', $updateData);
    }

    //Testar o DELETE de salas pelo $id
    public function test_delete_sala()
    {
        $this->authenticate();

        $sala = SalaTreinamento::factory()->create();

        $response = $this->deleteJson("/api/salas/{$sala->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('sala_treinamentos', ['id' => $sala->id]);
    }
}
