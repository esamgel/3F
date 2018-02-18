<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function accounts()
  {
      return $this->hasMany(Account::class);
  }

  public function balance()
  {
      return $this->hasOne(Balance::class);
  }
}
