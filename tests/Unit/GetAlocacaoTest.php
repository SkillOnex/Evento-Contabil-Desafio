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
    use RefreshDatabase; // Reseta o banco de dados entre os testes

    public function test_get_alocacao_returns_expected_arrays()
    {
        // Arrange: cria uma pessoa participante, uma sala de treinamento e um espaço de café
        $pessoa = PessoaParticipante::factory()->create();
        $sala = SalaTreinamento::factory()->create();
        $cafe = EspacoCafe::factory()->create();

        // Cria uma alocação para a pessoa na etapa 1, associando sala e café
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $sala->id,
            'espaco_cafe_id' => $cafe->id,
            'etapa' => 1,
        ]);

        // Act: instancia o controller e chama o método getAlocacao com a pessoa
        $controller = new EventoController();
        $result = $controller->getAlocacao($pessoa);

        // Assert: verifica se o resultado tem as chaves 'salas' e 'cafes'
        $this->assertArrayHasKey('salas', $result);
        $this->assertArrayHasKey('cafes', $result);

        // Verifica se o nome da sala e do café retornados conferem com os criados
        $this->assertEquals($sala->nome, $result['salas'][0]['nome']);
        $this->assertEquals($cafe->nome, $result['cafes'][0]['nome']);
    }
}
