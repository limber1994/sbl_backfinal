<?php

namespace App\Http\Controllers;

use App\Models\Bankbook;
use Illuminate\Http\Request;

class BankbookController extends Controller
{
    public function index()
    {
        $bankbooks = Bankbook::all();
        return response()->json($bankbooks);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'observation' => 'required|string|max:255',
            'state' => 'required|in:Completo,Incompleto,Observado'
        ]);

        $bankbook = Bankbook::create($validatedData);
        return response()->json($bankbook, 201);
    }

    public function show($id)
    {
        $bankbook = Bankbook::findOrFail($id);
        return response()->json($bankbook);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'observation' => 'required|string|max:255',
            'state' => 'required|in:Completo,Incompleto,Observado'
        ]);

        $bankbook = Bankbook::findOrFail($id);
        $bankbook->update($validatedData);
        return response()->json($bankbook);
    }

    public function destroy($id)
    {
        $bankbook = Bankbook::findOrFail($id);
        $bankbook->delete();
        return response()->json(null, 204);
    }
}
