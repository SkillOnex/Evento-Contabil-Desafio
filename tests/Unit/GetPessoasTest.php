<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;
use App\Models\SalaTreinamento;
use App\Models\EspacoCafe;
use App\Http\Controllers\EventoController;

class GetPessoasTest extends TestCase
{
    use RefreshDatabase; // Reseta o banco de dados entre os testes para ambiente limpo

    public function test_get_pessoas_returns_pessoas_with_alocacoes()
    {
        // Arrange: cria uma sala de treinamento e um espaço de café
        $sala1 = SalaTreinamento::factory()->create();
        $cafe1 = EspacoCafe::factory()->create();

        // Cria uma pessoa participante
        $pessoa = PessoaParticipante::factory()->create();

        // Cria uma alocação para a pessoa na sala e espaço de café na etapa 1
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala1->id,
            'espaco_cafe_id' => $cafe1->id,
            'etapa' => 1,
        ]);

        // Act: chama o método getPessoas do controller para buscar as pessoas com alocações
        $controller = new EventoController();
        $result = $controller->getPessoas();

        // Assert: verifica se o resultado tem a chave 'pessoas'
        $this->assertArrayHasKey('pessoas', $result);

        // Verifica se retornou exatamente uma pessoa
        $this->assertCount(1, $result['pessoas']);

        // Verifica se a etapa da alocação da sala é '1'
        $this->assertEquals('1', $result['pessoas'][0]->alocacoes_salas[0]['etapa']);

        // Verifica se o nome da sala alocada é o mesmo da sala criada
        $this->assertEquals($sala1->nome, $result['pessoas'][0]->alocacoes_salas[0]['nome']);
    }
}
