<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\SalaTreinamento;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;
use App\Http\Controllers\EventoController;

class GetSalasTest extends TestCase
{
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    public function test_get_salas_returns_salas_with_participants_grouped_by_stage()
    {
        // Cria 2 salas
        $salas = SalaTreinamento::factory()->count(2)->create();

        // Cria participantes
        $pessoa1 = PessoaParticipante::factory()->create(['nome' => 'Ana']);
        $pessoa2 = PessoaParticipante::factory()->create(['nome' => 'Bruno']);

        // Cria alocações: Ana na etapa 1 da sala 1, Bruno na etapa 2 da sala 2
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa1->id,
            'sala_treinamento_id' => $salas[0]->id,
            'espaco_cafe_id' => null,
            'etapa' => 1,
        ]);

        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa2->id,
            'sala_treinamento_id' => $salas[1]->id,
            'espaco_cafe_id' => null,
            'etapa' => 2,
        ]);

        // Instancia o controller e chama o método
        $controller = new EventoController();
        $resultado = $controller->getSalas();

        // Verifica se o retorno tem a chave 'salas' e 2 salas
        $this->assertArrayHasKey('salas', $resultado);
        $this->assertCount(2, $resultado['salas']);

        // Pega as salas do resultado
        $sala1 = $resultado['salas'][0];
        $sala2 = $resultado['salas'][1];

        // Verifica se a sala 1 tem a Ana na etapa 1
        $this->assertEquals('Ana', $sala1->pessoas_por_etapas[1][0]->nome);

        // Verifica se a sala 2 tem o Bruno na etapa 2
        $this->assertEquals('Bruno', $sala2->pessoas_por_etapas[2][0]->nome);

        // Também verifica se as outras etapas estão vazias
        $this->assertEmpty($sala1->pessoas_por_etapas[2]);
        $this->assertEmpty($sala2->pessoas_por_etapas[1]);
    }
}
