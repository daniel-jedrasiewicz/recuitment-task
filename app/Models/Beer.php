<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'name',
        'rating_average',
        'rating_reviews',
        'image',
        'id',
        'id_api',

    ];

    protected $table = 'beers';

}
