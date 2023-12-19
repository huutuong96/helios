<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizedetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_size',
        'price_to_size'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_size_detail';
    public  $timestamps = false;
}
