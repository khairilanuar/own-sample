<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthProblem extends Model
{
    protected $table = 'health_problems';

    protected $guarded = [];

    public function forms() {
        // return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany(Form::class);
    }
}
