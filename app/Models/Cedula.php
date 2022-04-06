<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_tax_certificate',
        'complete_name',
        'date_issue',
        'address',
        'sex',
        'citizenship',
        'date_of_birth',
        'place_of_birth',
        'civil_status'
    ];
}
