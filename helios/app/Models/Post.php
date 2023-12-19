<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        "topic_id",
        "title",
        "slug",
        "detail",
        "img",
        "type",
        "status"
    ];
    protected $primarykey = "id";
    protected $table = "db_post";
    public $timestamps = false;
}
