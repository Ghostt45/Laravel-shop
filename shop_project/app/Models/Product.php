<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'is_published',
        'user_id',
    ];
}
