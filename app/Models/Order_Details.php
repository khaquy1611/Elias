<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['product_id','oders_id','quantity','price'];
}
