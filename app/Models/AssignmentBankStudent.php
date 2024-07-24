<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentBankStudent extends Model
{
    use HasFactory;

    protected $table = 'assignmentbankstudent';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'BankBooksId',
        'StudentId',
        'StateAssignBank',
        'Deadline',
        'ReceptionDate',
        'observation'
    ];

    protected $dates = ['Deadline', 'ReceptionDate'];

    protected $casts = [
        'Deadline' => 'date:Y-m-d',
        'ReceptionDate' => 'date:Y-m-d',
    ];

    public function bankbook()
    {
        return $this->belongsTo(Bankbook::class, 'BankBooksId');
    }
}
