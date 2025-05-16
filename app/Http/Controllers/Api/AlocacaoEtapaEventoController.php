<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlocacaoEtapaEvento;
use App\Models\PessoaParticipante;

class AlocacaoEtapaEventoController extends Controller
{
    //Index : Exibir todas as Alocacoes
    public function index()
    {
        $alocacoes = AlocacaoEtapaEvento::with(['pessoaParticipante', 'salaTreinamento', 'espacoCafe'])->get();
        return response()->json($alocacoes);
    }

    
    //Show : Exibir Alocacoes ja existentes pelo $id
    public function show($id)
    {
        $alocacao = AlocacaoEtapaEvento::with(['pessoaParticipante', 'salaTreinamento', 'espacoCafe'])->find($id);

        if (!$alocacao) {
            return response()->json(['message' => 'Alocação não encontrada.'], 404);
        }

        return response()->json($alocacao);
    }

    //Store : Registrar uma Locacao
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'sala_treinamento_id' => 'required|exists:sala_treinamentos,id',
            'espaco_cafe_id' => 'required|exists:espaco_cafes,id',
            'etapa' => 'required|in:1,2',
        ]);

        try {
            // Cria a pessoa
            $pessoa = PessoaParticipante::create([
                'nome' => $validated['nome'],
                'sobrenome' => $validated['sobrenome'],
            ]);

            // Cria a alocação
            $alocacao = AlocacaoEtapaEvento::create([
                'pessoa_participante_id' => $pessoa->id,
                'sala_treinamento_id' => $validated['sala_treinamento_id'],
                'espaco_cafe_id' => $validated['espaco_cafe_id'],
                'etapa' => $validated['etapa'],
            ]);

            return response()->json([
                'message' => 'Pessoa e alocação criadas com sucesso!',
                'pessoa' => $pessoa,
                'alocacao' => $alocacao,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar alocação.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    //Update : atualizar uma locacao pelo $id
    public function update(Request $request, $id)
    {
        $alocacao = AlocacaoEtapaEvento::find($id);

        if (!$alocacao) {
            return response()->json(['message' => 'Alocação não encontrada.'], 404);
        }

        $validated = $request->validate([
            'sala_treinamento_id' => 'sometimes|exists:sala_treinamentos,id',
            'espaco_cafe_id' => 'sometimes|exists:espaco_cafes,id',
            'etapa' => 'sometimes|in:1,2',
        ]);

        $alocacao->update($validated);

        return response()->json(['message' => 'Alocação atualizada com sucesso!', 'alocacao' => $alocacao]);
    }

    //Destroy : Deletar uma locacao pelo $id
    public function destroy($id)
    {
        $alocacao = AlocacaoEtapaEvento::find($id);

        if (!$alocacao) {
            return response()->json(['message' => 'Alocação não encontrada.'], 404);
        }

        $alocacao->delete();

        return response()->json(['message' => 'Alocação deletada com sucesso.']);
    }
}
