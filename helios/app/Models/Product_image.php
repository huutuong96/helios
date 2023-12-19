<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image'
    ];
    protected $primaryKey = 'id';
    protected $foreignKey = 'product_id';
    protected $table = 'db_product_img';
    public  $timestamps = false;
}