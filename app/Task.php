<?php

namespace App;

use illuminate\database\eloquent\model;

class task extends model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
