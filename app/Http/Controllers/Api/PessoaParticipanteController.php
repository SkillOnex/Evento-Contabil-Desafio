<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PessoaParticipante;
use Illuminate\Http\Request;

class PessoaParticipanteController extends Controller
{
    public function index()
    {
        return PessoaParticipante::all();
    }

    public function show($id)
    {
        return PessoaParticipante::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
        ]);

        $pessoa = PessoaParticipante::create($validated);
        return response()->json($pessoa, 201);
    }

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

    public function destroy($id)
    {
        PessoaParticipante::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

