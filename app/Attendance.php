<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'entry_ip',  'entry_location' , 'registered'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
