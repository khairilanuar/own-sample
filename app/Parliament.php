<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parliament extends Model
{
    protected $table = 'parliaments';
    public $timestamps = false;
    protected $guarded = [];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function duns() {
        return $this->hasMany(Dun::class);
    }
}
