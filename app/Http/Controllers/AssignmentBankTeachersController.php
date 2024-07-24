<?php

namespace App\Http\Controllers;
use App\Models\AssignmentBankTeachers;
use Illuminate\Http\Request;


class AssignmentBankTeachersController extends Controller
{
    public function index()
    {
        return AssignmentBankTeachers::all();

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'BankBooksId' => 'required|exists:bankbooks,Id',
             'TeacherId' => 'required', // Asumiendo que tienes una tabla 'students'
             'StateBank' => 'required|in:Entregado,Devuelto,Observado',
             'Deadline' => 'required|date_format:Y-m-d',
             'ReceptionDate' => 'required|date_format:Y-m-d',
             'observation' => 'required|string|max:255'
         ]);
         $assignment = AssignmentBankTeachers::create($validatedData);
         return response()->json($assignment, 201);

    }

    public function show($id)
    {
        $assignment = AssignmentBankTeachers::where('BankBooksId', $id)->firstOrFail();
        return response()->json($assignment);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'BankBooksId' => 'required|exists:bankbooks,Id',
            'TeacherId' => 'required',
            'StateBank' => 'required|in:Entregado,Devuelto,Observado',
            'Deadline' => 'required|date_format:Y-m-d',
            'ReceptionDate' => 'required|date_format:Y-m-d',
            'observation' => 'nullable|string|max:255'
        ]);

        list($BankBooksId, $TeacherId) = explode('-', $id);
        $assignment = AssignmentBankTeachers::where('BankBooksId', $BankBooksId)->where('TeacherId', $TeacherId)->firstOrFail();
        $assignment->update($validatedData);

        return response()->json($assignment);
    }

    public function destroy($id)
    {
        list($BankBooksId, $TeacherId) = explode('-', $id);
        $assignment = AssignmentBankTeachers::where('BankBooksId', $BankBooksId)->where('TeacherId', $TeacherId)->firstOrFail();
        $assignment->delete();

        return response()->json(null, 204);
    }
}
