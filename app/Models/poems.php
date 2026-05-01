<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class poems extends Model
{

    protected $fillable = [
        'user_id',
        'poem_title',
        'poem_content',
        'image',
        'poem_link'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
