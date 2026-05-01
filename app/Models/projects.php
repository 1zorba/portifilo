<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'link_location', 'image_url', 'user_id'];
    public function User()
    {
        $this->belongsTo(User::class);
    }
}
