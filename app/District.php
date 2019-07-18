<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $guarded = [];

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function parliaments() {
        return $this->hasMany(Parliament::class);
    }
}
