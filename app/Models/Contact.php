<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'title',
        'detail',
        'contact_reply',
        'status',
        'isDeleted'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_contact';
    public  $timestamps = false;
}
