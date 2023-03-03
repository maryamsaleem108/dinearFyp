<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'dish';
    protected $primaryKey = 'dish_id';

    protected $fillable = [
        'name',
        'calories',
        'ingredients',
        'image',
        'price',

    ];
}
