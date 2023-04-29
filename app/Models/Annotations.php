<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Annotations extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'annotations';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $casts = [
        'title' => 'string',
        'content' => 'string'
    ];
}
