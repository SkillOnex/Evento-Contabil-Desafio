<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EspacoCafe;
use Illuminate\Http\Request;

class EspacoCafeController extends Controller
{

    //Index : Exibir todos os cafes
    public function index()
    {
        return EspacoCafe::all();
    }

    //Show : Exibir cafes pelo $id
    public function show($id)
    {
        return EspacoCafe::findOrFail($id);
    }

    //Store : Registrar um café 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'lotacao' => 'required|string',

        ]);

        $cafe = EspacoCafe::create($validated);
        return response()->json($cafe, 201);
    }

    //Update: Atualizar um café ja existente pelo $id
    public function update(Request $request, $id)
    {
        $cafe = EspacoCafe::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'lotacao' => 'required|string',
        ]);

        $cafe->update($validated);
        return response()->json($cafe);
    }

    //Destroy : Deletar um café pelo $id
    public function destroy($id)
    {
        EspacoCafe::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
