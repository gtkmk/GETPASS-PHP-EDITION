<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Annotations extends Model
{
    use HasFactory;

    protected $table = 'annotations';

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'user_id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
