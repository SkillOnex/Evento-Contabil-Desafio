<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EspacoCafeController extends Controller
{

    public function index()
    {
        return EspacoCafe::all();
    }


    public function show($id)
    {
        return EspacoCafe::findOrFail($id);
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',

        ]);

        $cafe = EspacoCafe::create($validated);
        return response()->json($cafe, 201);
    }


    public function update(Request $request, $id)
    {
        $cafe = EspacoCafe::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string',

        ]);

        $cafe->update($validated);
        return response()->json($cafe);
    }


    public function destroy($id)
    {
        EspacoCafe::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
