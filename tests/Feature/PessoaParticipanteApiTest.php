<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PessoaParticipante;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PessoaParticipanteApiTest extends TestCase
{
    use RefreshDatabase;

    //Autentica para o teste
    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');
    }

    //Testar o GET de pessoas sem estar Autenticado
    public function test_list_pessoas_requires_authentication()
    {
        $response = $this->getJson('/api/pessoas');
        $response->assertStatus(401); // Não autorizado se não estiver autenticado
    }

    //Testar o GET de pessoas Autenticado
    public function test_list_pessoas_returns_data_when_authenticated()
    {
        $this->authenticate();

        PessoaParticipante::factory()->count(3)->create();

        $response = $this->getJson('/api/pessoas');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    //Testar o POST de pessoas 
    public function test_create_pessoa_participante()
    {
        $this->authenticate();

        $data = [
            'nome' => 'João',
            'sobrenome' => 'Silva',
        ];

        $response = $this->postJson('/api/pessoas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('pessoa_participantes', $data);
    }

    //Testar o PUT de pessoas pelo $id
    public function test_update_pessoa_participante()
    {
        $this->authenticate();

        $pessoa = PessoaParticipante::factory()->create();

        $updateData = [
            'nome' => 'Maria',
            'sobrenome' => 'Souza',
        ];

        $response = $this->putJson("/api/pessoas/{$pessoa->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('pessoa_participantes', $updateData + ['id' => $pessoa->id]);
    }

    //Testar o DELETE de pessoas pelo $id
    public function test_delete_pessoa_participante()
    {
        $this->authenticate();

        $pessoa = PessoaParticipante::factory()->create();

        $response = $this->deleteJson("/api/pessoas/{$pessoa->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('pessoa_participantes', ['id' => $pessoa->id]);
    }
}
