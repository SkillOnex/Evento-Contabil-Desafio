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
    // Garante que o banco de dados seja limpo antes de cada teste
    use RefreshDatabase;

    // Testa se o método getPessoas retorna corretamente os participantes com suas alocações de sala e café
    public function test_get_pessoas_returns_pessoas_with_sala_and_cafe_allocations()
    {
        // Cria uma sala, um café e um participante
        $sala = SalaTreinamento::factory()->create(['nome' => 'Sala 1']);
        $cafe = EspacoCafe::factory()->create(['nome' => 'Café 1']);
        $pessoa = PessoaParticipante::factory()->create(['nome' => 'Carlos']);

        // Cria uma alocação do participante na etapa 1, com sala e café associados
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala->id,
            'espaco_cafe_id' => $cafe->id,
            'etapa' => 1,
        ]);

        // Chama o método do controller que retorna os participantes com alocações
        $controller = new EventoController();
        $result = $controller->getPessoas();

        // Verifica se o resultado contém a chave 'pessoas'
        $this->assertArrayHasKey('pessoas', $result);

        // Verifica se foi retornado apenas 1 participante
        $this->assertCount(1, $result['pessoas']);

        // Pega a pessoa retornada para validações detalhadas
        $retornada = $result['pessoas'][0];

        // Verifica se existem dados de alocação de sala
        $this->assertNotEmpty($retornada->alocacoes_salas);
        $this->assertEquals(1, $retornada->alocacoes_salas[0]['etapa']);         // Etapa correta
        $this->assertEquals('Sala 1', $retornada->alocacoes_salas[0]['nome']);   // Nome correto da sala

        // Verifica se existem dados de alocação de café
        $this->assertNotEmpty($retornada->alocacoes_cafes);
        $this->assertEquals(1, $retornada->alocacoes_cafes[0]['etapa']);         // Etapa correta
        $this->assertEquals('Café 1', $retornada->alocacoes_cafes[0]['nome']);   // Nome correto do café
    }
}
