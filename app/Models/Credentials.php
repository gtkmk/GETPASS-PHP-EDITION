<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    use HasFactory;

    protected $table = 'crendentials';

    protected $fillable = [
        'username',
        'password',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'username' => 'string',
        'password' => 'string',
        'user_id' => 'int',
        'category_id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
