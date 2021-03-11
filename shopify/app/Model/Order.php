<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'Customer_Name','product_id','product_Price','Payment_status','Fulfillment'
    ];
}
