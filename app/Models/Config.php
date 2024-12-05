<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'logo',
        'icon',
        'url',
        'address',
        'map',
        'phone',
        'email'
    ];
    protected $primaryKey = 'id';
    protected $table = 'db_config';
    public  $timestamps = false;
}
