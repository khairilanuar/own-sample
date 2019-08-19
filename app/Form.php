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

    public function health_problems() {
        // return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany(HealthProblem::class);
    }
}
