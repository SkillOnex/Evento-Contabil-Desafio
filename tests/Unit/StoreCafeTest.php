<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\EspacoCafe;
use App\Models\User;

class StoreCafeTest extends TestCase
{
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    // Testa se um café é criado corretamente com dados válidos
    public function test_store_cafe_creates_new_cafe_with_valid_data()
    {
        // Autentica um usuário para evitar redirecionamento ao login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Dados válidos de entrada
        $data = [
            'name_cafe' => 'Espaço Café Teste',
            'lotacao_cafe' => 15,
        ];

        // Envia requisição POST para criar o café
        $response = $this->post('/evento/cafes', $data);

        // Verifica se redirecionou corretamente (normal após um store)
        $response->assertRedirect();

        // Verifica se a sessão contém a mensagem de sucesso esperada
        $response->assertSessionHas('success', 'Café cadastrado com sucesso!');

        // Verifica se os dados foram realmente salvos no banco
        $this->assertDatabaseHas('espaco_cafes', [
            'nome' => 'Espaço Café Teste',
            'lotacao' => 15,
        ]);
    }

    // Testa se a criação de café falha com dados inválidos
    public function test_store_cafe_fails_with_invalid_data()
    {
        // Autentica um usuário
        $user = User::factory()->create();
        $this->actingAs($user);

        // Dados inválidos: nome com <script> (proibido) e lotação vazia
        $data = [
            'name_cafe' => '<script>',
            'lotacao_cafe' => '',
        ];

        // Envia a requisição POST
        $response = $this->post('/evento/cafes', $data);

        // Verifica se os erros de validação foram armazenados na sessão
        $response->assertSessionHasErrors(['name_cafe', 'lotacao_cafe']);

        // Garante que nenhum café foi salvo no banco
        $this->assertDatabaseCount('espaco_cafes', 0);
    }

    // Testa se a criação de café falha ao tentar cadastrar um nome já existente
    public function test_store_cafe_fails_with_duplicate_name()
    {
        // Autentica um usuário
        $user = User::factory()->create();
        $this->actingAs($user);

        // Cria um café com nome pré-existente
        EspacoCafe::create([
            'nome' => 'Espaço Café Teste',
            'lotacao' => 20,
        ]);

        // Tenta cadastrar um novo café com o mesmo nome
        $data = [
            'name_cafe' => 'Espaço Café Teste',
            'lotacao_cafe' => 25,
        ];

        $response = $this->post('/evento/cafes', $data);

        // Espera erro de validação referente ao nome duplicado
        $response->assertSessionHasErrors(['name_cafe']);

        // Confirma que ainda existe apenas um café no banco
        $this->assertDatabaseCount('espaco_cafes', 1);
    }
}
