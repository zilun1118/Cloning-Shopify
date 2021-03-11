<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'Title','Description','media','price','cost_per_item','SKU','weight'
    ];
}
