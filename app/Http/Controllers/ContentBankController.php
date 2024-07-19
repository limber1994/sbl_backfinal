<?php

namespace App\Http\Controllers;

use App\Models\ContentBank;
use Illuminate\Http\Request;

class ContentBankController extends Controller
{
    public function index()
    {
        return ContentBank::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'BankId' => 'required|exists:bankbooks,Id',
            'SampleBookId' => 'required|exists:samplebooks,Id',
            'state' => 'required|in:Observado,Incompleto,Completo',
        ]);

        $contentBank = ContentBank::create($validatedData);
        return response()->json($contentBank, 201);
    }

    public function show($id)
    {
        list($BankId, $SampleBookId) = explode('-', $id);
        $contentBank = ContentBank::where('BankId', $BankId)->where('SampleBookId', $SampleBookId)->firstOrFail();
        return response()->json($contentBank);
    }

    public function update(Request $request, $id)
    {
        list($BankId, $SampleBookId) = explode('-', $id);
        $validatedData = $request->validate([
            'state' => 'required|in:Observado,Incompleto,Completo',
        ]);

        $contentBank = ContentBank::where('BankId', $BankId)->where('SampleBookId', $SampleBookId)->firstOrFail();
        $contentBank->update($validatedData);

        return response()->json($contentBank);
    }

    public function destroy($id)
    {
        list($BankId, $SampleBookId) = explode('-', $id);
        $contentBank = ContentBank::where('BankId', $BankId)->where('SampleBookId', $SampleBookId)->firstOrFail();
        $contentBank->delete();

        return response()->json(null, 204);
    }
}
