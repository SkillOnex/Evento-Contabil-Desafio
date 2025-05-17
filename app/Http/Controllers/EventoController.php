<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaTreinamento;
use App\Models\EspacoCafe;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;


class EventoController extends Controller
{
    // Exibe a view principal do evento, com salas, cafés e pessoas com alocações
    public function index()
    {
        $getsalas = $this->getSalas();     // Obtém todas as salas
        $getcafes = $this->getCafes();     // Obtém todos os espaços de café
        $pessoas = $this->getPessoas();    // Obtém todas as pessoas com suas alocações
        // Retorna a view 'evento' passando os dados combinados
        return view('evento', array_merge($getsalas , $getcafes , $pessoas));
    }

    // Retorna um array com todas as salas
    public function getSalas()
    {
        $salas = SalaTreinamento::all();

        foreach ($salas as $sala) {
            $alocacoes = AlocacaoEtapaEvento::where('sala_treinamento_id', $sala->id)
                ->with('pessoaParticipante')
                ->get();

            $pessoasPorEtapas = [
                1 => [],
                2 => [],
            ];

            foreach ($alocacoes as $alocacao) {
                if (isset($pessoasPorEtapas[$alocacao->etapa])) {
                    $pessoasPorEtapas[$alocacao->etapa][] = $alocacao->pessoaParticipante;
                }
            }

            $sala->pessoas_por_etapas = $pessoasPorEtapas;
        }

        return ['salas' => $salas];
    }


    // Retorna um array com todos os espaços de café
    public function getCafes()
    {
        $cafes = EspacoCafe::all();
        return ['cafes' => $cafes];
    }

    // Retorna um array com todas as pessoas e suas alocações em salas e cafés
    public function getPessoas()
    {
        $pessoas = PessoaParticipante::all();

        // Para cada pessoa, adiciona suas alocações de salas e cafés
        foreach ($pessoas as $pessoa) {
            $alocacao = $this->getAlocacao($pessoa);
            // Adiciona as alocações como propriedades no objeto para facilitar acesso na view
            $pessoa->alocacoes_salas = $alocacao['salas'];
            $pessoa->alocacoes_cafes = $alocacao['cafes'];
        }

        return ['pessoas' => $pessoas];
    }

    // Recebe os dados do formulário e cria uma nova pessoa participante e suas alocações nas etapas 1 e 2
    public function storeAlocacoes(Request $request)
    {
        // 1. Cria a pessoa participante com nome e sobrenome informados
        $pessoa = PessoaParticipante::create([
            'nome' => $request->input('name_etp1'),
            'sobrenome' => $request->input('lastname_etp1'),
        ]);

        // 2. Cria a alocação para a etapa 1 (sala e café)
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $request->input('sala_etp1'),
            'espaco_cafe_id' => $request->input('cafe_etp1'),
            'etapa' => 1,
        ]);

        // 3. Cria a alocação para a etapa 2 (sala e café)
        AlocacaoEtapaEvento::create([
            'pessoa_participante_id' => $pessoa->id,
            'sala_treinamento_id' => $request->input('sala_etp2'),
            'espaco_cafe_id' => $request->input('cafe_etp2'),
            'etapa' => 2,
        ]);

        // Redireciona de volta com mensagem de sucesso
        return redirect()->back()->with('success', 'Participante alocado com sucesso!');
    }

    // Retorna as alocações de salas e cafés para uma pessoa participante específica
    public function getAlocacao(PessoaParticipante $pessoa)
    {
        // Busca todas as alocações da pessoa
        $alocacoes = AlocacaoEtapaEvento::where('pessoa_participante_id', $pessoa->id)->get();

        $salas = [];
        $cafes = [];

        // Para cada alocação, separa os dados de salas e cafés com o nome e a etapa
        foreach ($alocacoes as $aloc) {
            if ($aloc->sala_treinamento_id) {
                $salas[] = [
                    'etapa' => $aloc->etapa,
                    'nome' => $aloc->salaTreinamento->nome ?? 'Sala não encontrada',
                ];
            }
            if ($aloc->espaco_cafe_id) {
                $cafes[] = [
                    'etapa' => $aloc->etapa,
                    'nome' => $aloc->espacoCafe->nome ?? 'Café não encontrado',
                ];
            }
        }

        // Retorna arrays associativos com salas e cafés
        return ['salas' => $salas, 'cafes' => $cafes];
    }


    // Salva as salas
    public function salvarSala(Request $request)
    {
        // Validação
        $request->validate([
            'name_sala' => 'required|string|max:255',
            'lotacao' => 'required|integer|min:1',
        ]);

        // Cria a Sala
        SalaTreinamento::create([
            'nome' => $request->name_sala,
            'lotacao' => $request->lotacao,
        ]);

        return redirect()->back()->with('success', 'Sala cadastrada com sucesso!');
    }

}
