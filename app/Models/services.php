<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $guarded = [''];

    public function User()
    {
          $this->belongsTo(User::class);
    }
}
