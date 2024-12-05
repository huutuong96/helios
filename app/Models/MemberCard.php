<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCard extends Model
{
    use HasFactory;

    protected $fillable = [
        "rand_type",
        "promotion",
        "infor1",
        "infor2",
        "infor3",
        "img",
        "status"
    ];
    protected $primarykey = "id";
    protected $table = "db_member_card";
    public $timestamps = false;
}
