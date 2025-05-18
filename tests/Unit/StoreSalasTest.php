<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\SalaTreinamento;
use App\Models\User;

class StoreSalaTest extends TestCase
{
    // Garante que o banco de dados seja resetado antes de cada teste
    use RefreshDatabase;

    // Testa se uma nova sala é criada com dados válidos
    public function test_store_room_creates_new_room_with_valid_data()
    {
        // Autentica um usuário para evitar redirecionamento para login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Define os dados válidos da sala
        $data = [
            'name_sala' => 'Sala de Teste',
            'lotacao' => 30,
        ];

        // Envia uma requisição POST para criar a sala
        $response = $this->post('/evento/salas', $data);

        // Verifica se houve redirecionamento e se a mensagem de sucesso está presente na sessão
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Sala cadastrada com sucesso!');

        // Verifica se os dados foram inseridos corretamente no banco
        $this->assertDatabaseHas('sala_treinamentos', [
            'nome' => 'Sala de Teste',
            'lotacao' => 30,
        ]);
    }

    // Testa se o cadastro falha com dados inválidos
    public function test_store_room_fails_with_invalid_data()
    {
        // Autentica um usuário
        $user = User::factory()->create();
        $this->actingAs($user);

        // Dados inválidos: nome vazio e lotação menor que o mínimo
        $data = [
            'name_sala' => '',
            'lotacao' => 0,
        ];

        // Tenta criar a sala com os dados inválidos
        $response = $this->post('/evento/salas', $data);

        // Verifica se foram gerados erros de validação para os campos
        $response->assertSessionHasErrors(['name_sala', 'lotacao']);

        // Verifica que nenhuma sala foi criada
        $this->assertDatabaseCount('sala_treinamentos', 0);
    }

    // Testa se o sistema impede o cadastro de salas com nome duplicado
    public function test_store_room_fails_when_name_already_exists()
    {
        // Autentica um usuário
        $user = User::factory()->create();
        $this->actingAs($user);

        // Cria uma sala previamente com nome específico
        SalaTreinamento::create([
            'nome' => 'Sala Repetida',
            'lotacao' => 20,
        ]);

        // Tenta cadastrar uma nova sala com o mesmo nome
        $data = [
            'name_sala' => 'Sala Repetida',
            'lotacao' => 25,
        ];

        // Envia a requisição POST
        $response = $this->post('/evento/salas', $data);

        // Verifica se ocorreu erro de validação no campo name_sala
        $response->assertSessionHasErrors(['name_sala']);

        // Confirma que apenas uma sala existe no banco
        $this->assertDatabaseCount('sala_treinamentos', 1);
    }
}
