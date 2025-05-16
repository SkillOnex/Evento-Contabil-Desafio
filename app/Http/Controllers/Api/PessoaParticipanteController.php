<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PessoaParticipante;
use Illuminate\Http\Request;

class PessoaParticipanteController extends Controller
{
    //Index : Retornar Todos os participantes
    public function index()
    {
        return PessoaParticipante::all();
    }

    //Show : Retornar Participantes pelo $id
    public function show($id)
    {
        return PessoaParticipante::findOrFail($id);
    }

    //Store : Registrar Novos participantes
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
        ]);

        $pessoa = PessoaParticipante::create($validated);
        return response()->json($pessoa, 201);
    }

    //Update : Atualizar um participante ja existente pelo $id
    public function update(Request $request, $id)
    {
        $pessoa = PessoaParticipante::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'sobrenome' => 'sometimes|required|string',
        ]);

        $pessoa->update($validated);
        return response()->json($pessoa);
    }

    //Destroy : Deletar o participante pelo $id
    public function destroy($id)
    {
        PessoaParticipante::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

