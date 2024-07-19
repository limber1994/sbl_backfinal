<?php

namespace App\Http\Controllers;

use App\Models\SampleBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Importa la clase Log

class SampleBookController extends Controller
{
    public function index()
    {
        return SampleBook::all();
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'BookId' => 'required|exists:books,Id',
                'Code' => 'required|unique:samplebooks,Code|max:4',
                'Observation' => 'required|string|max:256',
                'State' => 'required|in:Normal,Perdido,Dañado',
            ]);

            $sampleBook = SampleBook::create($validatedData);

            return response()->json($sampleBook, 201);
        } catch (\Exception $e) {
            Log::error('Error al almacenar un libro de muestra: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al procesar la solicitud.'], 500);
        }
    }

    public function show($id)
    {
        return SampleBook::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        try {
            $sampleBook = SampleBook::findOrFail($id);

            $validatedData = $request->validate([
                'BookId' => 'required|exists:books,Id',
                'Code' => 'required|max:4|unique:samplebooks,Code,' . $id,
                'Observation' => 'required|string|max:256',
                'State' => 'required|in:Normal,Perdido,Dañado',
            ]);

            $sampleBook->update($validatedData);

            return response()->json($sampleBook, 200);
        } catch (\Exception $e) {
            Log::error('Error al actualizar un libro de muestra: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al procesar la solicitud.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            SampleBook::destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error('Error al eliminar un libro de muestra: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al procesar la solicitud.'], 500);
        }
    }
}
