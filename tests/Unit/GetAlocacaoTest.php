<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;
use App\Models\SalaTreinamento;
use App\Models\EspacoCafe;
use App\Http\Controllers\EventoController;

class GetAlocacaoTest extends TestCase
{
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    // Testa se o método getAlocacao retorna os dados corretos de sala e café
    public function test_get_alocacao_returns_expected_sala_and_cafe_data()
    {
        // Cria uma pessoa, uma sala e um café com nomes definidos
        $pessoa = PessoaParticipante::factory()->create();
        $sala = SalaTreinamento::factory()->create(['nome' => 'Sala A']);
        $cafe = EspacoCafe::factory()->create(['nome' => 'Café B']);

        // Cria uma alocação na etapa 1 associando a pessoa à sala e ao café
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala->id,
            'espaco_cafe_id' => $cafe->id,
            'etapa' => 1,
        ]);

        // Chama o método getAlocacao do controller
        $controller = new EventoController();
        $result = $controller->getAlocacao($pessoa);

        // Verifica se os arrays 'salas' e 'cafes' estão presentes no resultado
        $this->assertArrayHasKey('salas', $result);
        $this->assertArrayHasKey('cafes', $result);

        // Verifica se há uma alocação de sala e uma de café
        $this->assertCount(1, $result['salas']);
        $this->assertCount(1, $result['cafes']);

        // Verifica se os dados da sala e do café estão corretos
        $this->assertEquals('Sala A', $result['salas'][0]['nome']);
        $this->assertEquals(1, $result['salas'][0]['etapa']);

        $this->assertEquals('Café B', $result['cafes'][0]['nome']);
        $this->assertEquals(1, $result['cafes'][0]['etapa']);
    }

    // Testa se o método getAlocacao lida corretamente com múltiplas etapas
    public function test_get_alocacao_handles_multiple_etapas()
    {
        // Cria uma pessoa e duas salas diferentes
        $pessoa = PessoaParticipante::factory()->create();
        $sala1 = SalaTreinamento::factory()->create(['nome' => 'Sala Etapa 1']);
        $sala2 = SalaTreinamento::factory()->create(['nome' => 'Sala Etapa 2']);

        // Cria alocação da pessoa na sala da etapa 1 (sem café)
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala1->id,
            'espaco_cafe_id' => null,
            'etapa' => 1,
        ]);

        // Cria alocação da pessoa na sala da etapa 2 (sem café)
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala2->id,
            'espaco_cafe_id' => null,
            'etapa' => 2,
        ]);

        // Chama o método getAlocacao
        $controller = new EventoController();
        $result = $controller->getAlocacao($pessoa);

        // Verifica se há duas alocações de salas e nenhuma de café
        $this->assertCount(2, $result['salas']);
        $this->assertEquals('Sala Etapa 1', $result['salas'][0]['nome']);
        $this->assertEquals(1, $result['salas'][0]['etapa']);
        $this->assertEquals('Sala Etapa 2', $result['salas'][1]['nome']);
        $this->assertEquals(2, $result['salas'][1]['etapa']);
        $this->assertEmpty($result['cafes']);
    }
}
