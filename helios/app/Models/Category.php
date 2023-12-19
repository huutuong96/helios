<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "slug",
        "parent_id",
        "orders",
        "status"
    ];
    protected $primaryKey= "id";
    protected $table = "db_category";
    public $timestamps = false; 
}
