<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleBook extends Model
{
    use HasFactory;
    // En tu modelo SampleBook.php
    
    protected $table = 'samplebooks';

    protected $fillable = ['BookId', 'Code', 'Observation', 'State'];
}
