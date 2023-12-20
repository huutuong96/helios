<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'detail',
        "status"
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_product_comment';
    public  $timestamps = false;
}
