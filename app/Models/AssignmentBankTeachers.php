<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentBankTeachers extends Model
{
    use HasFactory;

    protected $table = 'assignmentbankteachers';
    protected $primaryKey = 'Id';

    protected $fillable = [
        'BankBooksId',
        'TeacherId',
        'StateBank',
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
