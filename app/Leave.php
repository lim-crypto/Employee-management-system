<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = ['user_id', 'reason', 'description', 'half_day', 'status', 'start_date', 'end_date'];
    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
