<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaTreinamento;
use App\Models\EspacoCafe;
use App\Models\PessoaParticipante;
use App\Models\AlocacaoEtapaEvento;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

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

        foreach ($cafes as $cafe) {
            // Pega as alocações para este café, com a relação para pessoaParticipante
            $alocacoes = AlocacaoEtapaEvento::where('espaco_cafe_id', $cafe->id)
                ->with('pessoaParticipante')
                ->get();

            // Inicializa array para etapas 1 e 2 (ajuste se tiver mais etapas)
            $pessoasPorEtapas = [
                1 => [],
                2 => [],
            ];

            // Agrupa pessoas por etapa
            foreach ($alocacoes as $alocacao) {
                if (isset($pessoasPorEtapas[$alocacao->etapa])) {
                    $pessoasPorEtapas[$alocacao->etapa][] = $alocacao->pessoaParticipante;
                }
            }

            // Adiciona essa informação no objeto café
            $cafe->pessoas_por_etapas = $pessoasPorEtapas;
        }

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
        $nome = $request->input('name_etp1');
        $sobrenome = $request->input('lastname_etp1');

        // Tenta encontrar a pessoa já existente
        $pessoa = PessoaParticipante::where('nome', $nome)
            ->where('sobrenome', $sobrenome)
            ->first();

        // Se não existir cria
        if (!$pessoa) {
            $pessoa = PessoaParticipante::create([
                'nome' => $nome,
                'sobrenome' => $sobrenome,
            ]);
        }

        $sala1 = $request->input('sala_etp1');
        $sala2 = $request->input('sala_etp2');
        $cafe1 = $request->input('cafe_etp1');
        $cafe2 = $request->input('cafe_etp2');

        $salasNovas = [$sala1, $sala2];
        $cafesNovos = [$cafe1, $cafe2];

        // Conta quantas vezes a pessoa já está em cada sala
        $salaCounts = DB::table('alocacao_etapa_eventos')
            ->where('pessoa_participante_id', $pessoa->id)
            ->select('sala_treinamento_id', DB::raw('count(*) as total'))
            ->groupBy('sala_treinamento_id')
            ->pluck('total', 'sala_treinamento_id')
            ->toArray();

        // Conta quantas vezes a pessoa já está em cada café
        $cafeCounts = DB::table('alocacao_etapa_eventos')
            ->where('pessoa_participante_id', $pessoa->id)
            ->select('espaco_cafe_id', DB::raw('count(*) as total'))
            ->groupBy('espaco_cafe_id')
            ->pluck('total', 'espaco_cafe_id')
            ->toArray();

        // Adiciona as novas alocações dessa requisição
        foreach ($salasNovas as $salaId) {
            $salaCounts[$salaId] = ($salaCounts[$salaId] ?? 0) + 1;
            if ($salaCounts[$salaId] > 2) {
                return redirect()->back()->withErrors(['erro' => 'Participante não pode ser alocado mais de 2 vezes na mesma sala.']);
            }
        }

        foreach ($cafesNovos as $cafeId) {
            $cafeCounts[$cafeId] = ($cafeCounts[$cafeId] ?? 0) + 1;
            if ($cafeCounts[$cafeId] > 2) {
                return redirect()->back()->withErrors(['erro' => 'Participante não pode ser alocado mais de 2 vezes no mesmo café.']);
            }
        }

        // Atualiza ou cria a alocação da etapa 1
        AlocacaoEtapaEvento::updateOrCreate(
            ['pessoa_participante_id' => $pessoa->id, 'etapa' => 1],
            ['sala_treinamento_id' => $sala1, 'espaco_cafe_id' => $cafe1]
        );

        // Atualiza ou cria a alocação da etapa 2
        AlocacaoEtapaEvento::updateOrCreate(
            ['pessoa_participante_id' => $pessoa->id, 'etapa' => 2],
            ['sala_treinamento_id' => $sala2, 'espaco_cafe_id' => $cafe2]
        );

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

    // Recebe os dados do formulário e cria uma nova Sala
    public function storeSala(Request $request)
    {
        // Validação inicial dos dados
        $request->validate([
            'name_sala' => 'required|string|max:255|not_regex:/[<>]/',
            'lotacao' => 'required|integer|min:1|not_regex:/[<>]/',
        ]);

        // Verifica se já existe uma sala com o mesmo nome
        $salaExistente = SalaTreinamento::where('nome', $request->name_sala)->first();
        if ($salaExistente) {
            return redirect()->back()->withErrors(['name_sala' => 'Já existe uma sala com esse nome.'])->withInput();
        }

        // Cria a Sala
        SalaTreinamento::create([
            'nome' => $request->name_sala,
            'lotacao' => $request->lotacao,
        ]);

        return redirect()->back()->with('success', 'Sala cadastrada com sucesso!');
    }

    // Recebe os dados do formulário e cria um novo Café
    public function storeCafe(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name_cafe' => 'required|string|max:255|not_regex:/[<>]/',
            'lotacao_cafe' => 'required|integer|min:1|not_regex:/[<>]/',
        ]);

        // Verifica se já existe um café com o mesmo nome
        $cafeExistente = EspacoCafe::where('nome', $request->name_cafe)->first();
        if ($cafeExistente) {
            return redirect()->back()->withErrors(['name_cafe' => 'Já existe um espaço de café com esse nome.'])->withInput();
        }

        // Cria o novo café
        EspacoCafe::create([
            'nome' => $request->name_cafe,
            'lotacao' => $request->lotacao_cafe,
        ]);

        return redirect()->back()->with('success', 'Café cadastrado com sucesso!');
    }


}
