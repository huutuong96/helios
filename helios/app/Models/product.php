<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoty_id',
        'brand_id',
        'name',
        'slug',
        'sku',
        'smdetail',
        'detail',
        'material',
        'size',
        'quantity',
        'price',
        'promotion',
        'trending',
        'view',
        'sold_count',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_product';
    public  $timestamps = false;
}