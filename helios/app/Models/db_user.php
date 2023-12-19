<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class db_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'username',
        'password',
        'email',
        'addres',
        'phone',
        'img',
        'role',
        'rank_id',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_user';
    public  $timestamps = false;
}
