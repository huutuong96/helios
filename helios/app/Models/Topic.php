<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "parent_id",
        "orders",
        "status"
    ];
    protected $primarykey = "id";
    protected $table = "db_topic";
    public $timestamps = false;
}
