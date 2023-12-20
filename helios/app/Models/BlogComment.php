<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'detail',
        "status"
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_post_comment';
    public  $timestamps = false;
}
