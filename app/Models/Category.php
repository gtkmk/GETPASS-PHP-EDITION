<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'user_id'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function credentials()
    {
        return $this->hasMany(Credentials::class);
    }
}
