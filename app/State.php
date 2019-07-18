<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $guarded = [];

    public function districts() {
        return $this->hasMany(District::class);
    }
}
