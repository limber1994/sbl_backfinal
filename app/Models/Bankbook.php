<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankbook extends Model
{
    use HasFactory;

    protected $table = 'bankbooks';

    protected $fillable = [
        'quantity',
        'observation',
        'state'
    ];
}
