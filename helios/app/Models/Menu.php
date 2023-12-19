<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
        "link",
        "table_id",
        "parent_id",
        "orders",
        "position",
        "status"
    ];
    protected $primarykey = "id";
    protected $table = "db_menu";
    
    public $timestamps = false;
}
