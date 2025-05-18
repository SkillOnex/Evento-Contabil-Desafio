<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\SalaTreinamento;
use App\Models\EspacoCafe;
use App\Models\PessoaParticipante;
use App\Models\User;

class StoreAlocacoesTest extends TestCase
{
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    public function test_store_alocacoes_creates_pessoa_and_alocacoes_and_redirects()
    {
        // Cria um usuário e autentica para evitar redirecionamento ao login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Cria duas salas de treinamento e um espaço de café para uso no teste
        $sala1 = SalaTreinamento::factory()->create();
        $sala2 = SalaTreinamento::factory()->create();
        $cafe = EspacoCafe::factory()->create();

        // Faz uma requisição POST simulando o envio dos dados do formulário para alocar pessoa nas salas e cafés
        $response = $this->post('/evento/alocar', [
            'name_etp1' => 'João',
            'lastname_etp1' => 'Marcelo',
            'sala_etp1' => $sala1->id,
            'sala_etp2' => $sala2->id,
            'cafe_etp1' => $cafe->id,
            'cafe_etp2' => $cafe->id,
        ]);

        // Verifica se o registro da pessoa foi criado no banco de dados
        $this->assertDatabaseHas('pessoa_participantes', [
            'nome' => 'João',
            'sobrenome' => 'Marcelo',
        ]);

        // Busca a pessoa criada para usar o ID nas próximas verificações
        $pessoa = PessoaParticipante::where('nome', 'João')
            ->where('sobrenome', 'Marcelo')
            ->first();

        // Verifica se as alocações para a sala etapa 1 foram criadas corretamente
        $this->assertDatabaseHas('alocacao_etapa_eventos', [
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala1->id,
            'etapa' => 1,
        ]);

        // Verifica alocação para sala etapa 2
        $this->assertDatabaseHas('alocacao_etapa_eventos', [
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala2->id,
            'etapa' => 2,
        ]);

        // Verifica alocação para espaço café etapa 1
        $this->assertDatabaseHas('alocacao_etapa_eventos', [
            'pessoa_participante_id' => $pessoa->id,
            'espaco_cafe_id' => $cafe->id,
            'etapa' => 1,
        ]);

        // Verifica alocação para espaço café etapa 2
        $this->assertDatabaseHas('alocacao_etapa_eventos', [
            'pessoa_participante_id' => $pessoa->id,
            'espaco_cafe_id' => $cafe->id,
            'etapa' => 2,
        ]);

        // Verifica se a resposta redireciona para a página inicial ("/")
        $response->assertRedirect('/');
    }
}
