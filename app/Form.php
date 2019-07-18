<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    protected $guarded = [];

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function parliament() {
        return $this->belongsTo(Parliament::class);
    }

    public function dun() {
        return $this->belongsTo(Dun::class);
    }
}
