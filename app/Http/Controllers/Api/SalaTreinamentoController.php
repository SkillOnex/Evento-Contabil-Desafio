<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaTreinamento;

class SalaTreinamentoController extends Controller
{
    //Index : Exibir todas as Salas
    public function index()
    {
        return SalaTreinamento::all();
    }

    //Store : Registrar uma nova sala 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'lotacao' => 'required|integer',
        ]);

        $sala = SalaTreinamento::create($validated);
        return response()->json($sala, 201);
    }

    //Show : Exibir sala existente pelo $id
    public function show($id)
    {
        return SalaTreinamento::findOrFail($id);
    }

    //Update : Ataualizar uma sala já existente pelo $id
    public function update(Request $request, $id)
    {
        $sala = SalaTreinamento::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'lotacao' => 'sometimes|required|integer',
        ]);

        $sala->update($validated);
        return response()->json($sala);
    }

    //Destroy : Deletar uma sala existente pelo $id
    public function destroy($id)
    {
        SalaTreinamento::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
