<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'household_number',
        'suffix',
        'age',
        'birth_date',
        'gender',
        'purok',
        'contact_number'
    ];

}
