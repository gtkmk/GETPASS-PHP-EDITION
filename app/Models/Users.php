<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    protected $hidden = [
        'password',
    ];

    public static $rules = [
        'email' => 'unique'
    ];
}
