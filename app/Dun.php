<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dun extends Model
{
    protected $table = 'duns';
    public $timestamps = false;

    protected $guarded = [];

    public function parliament() {
        $this->belongsTo(Parliament::class);
    }
}
