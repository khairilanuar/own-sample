<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dun extends Model
{
    protected $table = 'duns';

    protected $guarded = [];

    public function parliament() {
        $this->belongsTo(Parliament::class);
    }
}
