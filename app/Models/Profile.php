<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{    //هذي تخلي الطلبات كلها مسموع انها تتخزن بالقاعدة واذا وضعنا اي عمود داخلها فهذا يعني انه مطلوب
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
