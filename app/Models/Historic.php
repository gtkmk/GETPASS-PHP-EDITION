<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'old_username',
        'old_password',
        'change_date',
        'crendentials_id',
    ];

    protected $casts = [
        'old_username' => 'string',
        'old_password' => 'string',
        'change_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
