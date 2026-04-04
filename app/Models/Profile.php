<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{    //هذي تخلي الطلبات كلها مسموع انها تتخزن بالقاعدة واذا وضعنا اي عمود داخلها فهذا يعني انه مطلوب

    protected $guarded=[''];

     public function user(){
return $this->belongsTo(User::class);
    }

}
