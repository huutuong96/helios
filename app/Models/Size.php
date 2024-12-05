<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'size_number',
        'change_price'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_size';
    public  $timestamps = false;
}
