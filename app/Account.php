<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }
}
