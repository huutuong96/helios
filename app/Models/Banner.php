<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [ 
        "name",
        "link",
        "position",
        "info1",
        "info2",
        "info3",
        "img",
        "orders",
        "status"
    ];
    protected $primaryKey = "id";
    protected $table = "db_banner";
    public $timestamps = false;
}
