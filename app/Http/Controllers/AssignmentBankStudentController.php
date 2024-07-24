<?php

namespace App\Http\Controllers;

use App\Models\AssignmentBankStudent;
use Illuminate\Http\Request;

class AssignmentBankStudentController extends Controller
{
    public function index()
    {
        return AssignmentBankStudent::all();

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'BankBooksId' => 'required|exists:bankbooks,Id',
             'StudentId' => 'required', // Asumiendo que tienes una tabla 'students'
             'StateAssignBank' => 'required|in:Entregado,Devuelto,Observado',
             'Deadline' => 'required|date_format:Y-m-d',
             'ReceptionDate' => 'required|date_format:Y-m-d',
             'observation' => 'required|string|max:255'
         ]);
         $assignment = AssignmentBankStudent::create($validatedData);
         return response()->json($assignment, 201);

    }

    public function show($id)
    {
        $assignment = AssignmentBankStudent::where('BankBooksId', $id)->firstOrFail();
        return response()->json($assignment);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'BankBooksId' => 'required|exists:bankbooks,Id',
            'StudentId' => 'required',
            'StateAssignBank' => 'required|in:Entregado,Devuelto,Observado',
            'Deadline' => 'required|date_format:Y-m-d',
            'ReceptionDate' => 'required|date_format:Y-m-d',
            'observation' => 'nullable|string|max:255'
        ]);

        list($BankBooksId, $StudentId) = explode('-', $id);
        $assignment = AssignmentBankStudent::where('BankBooksId', $BankBooksId)->where('StudentId', $StudentId)->firstOrFail();
        $assignment->update($validatedData);

        return response()->json($assignment);
    }

    public function destroy($id)
    {
        list($BankBooksId, $StudentId) = explode('-', $id);
        $assignment = AssignmentBankStudent::where('BankBooksId', $BankBooksId)->where('StudentId', $StudentId)->firstOrFail();
        $assignment->delete();

        return response()->json(null, 204);
    }
}
