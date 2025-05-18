<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\EspacoCafe;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;
use App\Http\Controllers\EventoController;

class GetCafesTest extends TestCase
{
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    // Testa se o método getCafes retorna os cafés com os participantes agrupados por etapa
    public function test_get_cafes_returns_cafes_with_participants_by_stage()
    {
        // Cria dois espaços de café com nomes definidos
        $cafe1 = EspacoCafe::factory()->create(['nome' => 'Café A']);
        $cafe2 = EspacoCafe::factory()->create(['nome' => 'Café B']);

        // Cria dois participantes com nomes específicos
        $pessoa1 = PessoaParticipante::factory()->create(['nome' => 'João']);
        $pessoa2 = PessoaParticipante::factory()->create(['nome' => 'Maria']);

        // Cria alocação do participante 1 no café A na etapa 1
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa1->id,
            'sala_treinamento_id' => null,
            'espaco_cafe_id' => $cafe1->id,
            'etapa' => 1,
        ]);

        // Cria alocação do participante 2 no café B na etapa 2
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa2->id,
            'sala_treinamento_id' => null,
            'espaco_cafe_id' => $cafe2->id,
            'etapa' => 2,
        ]);

        // Chama o método do controller para obter os cafés
        $controller = new EventoController();
        $result = $controller->getCafes();

        // Verifica se a resposta contém a chave 'cafes'
        $this->assertArrayHasKey('cafes', $result);

        // Verifica se retornaram exatamente dois cafés
        $this->assertCount(2, $result['cafes']);

        // Verifica que no café 1 (Café A), João está corretamente associado à etapa 1
        $this->assertEquals('João', $result['cafes'][0]->pessoas_por_etapas[1][0]->nome);
        // E que não há ninguém na etapa 2
        $this->assertEmpty($result['cafes'][0]->pessoas_por_etapas[2]);

        // Verifica que no café 2 (Café B), Maria está corretamente associada à etapa 2
        $this->assertEquals('Maria', $result['cafes'][1]->pessoas_por_etapas[2][0]->nome);
        // E que não há ninguém na etapa 1
        $this->assertEmpty($result['cafes'][1]->pessoas_por_etapas[1]);
    }
}
