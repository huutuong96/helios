<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = [ 
        "order_id",
        "product_id",
        "price",
        "quantity"
    ];
    protected $primaryKey = "id";
    protected $table = "db_orderdetail";
    public $timestamps = false;
}
