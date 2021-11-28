<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'year',
        'industry_aggregation_NZSIOC',
        'industry_code_NZSIOC',
        'industry_name_NZSIOC',
        'units',
        'variable_code',
        'variable_name',
        'variable_category',
        'value',
        'industry_code_ANZSIC06',
    ];

    protected $table = 'companies';

}

