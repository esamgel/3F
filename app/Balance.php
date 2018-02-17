<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
