<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  const PENDING  = 0;
  const ACCEPTED = 1;
  const REJECTED = 2;

  public function users()
  {
  	return $this->belongsTo('User');
  }

  public function payment_success(){
    $this->payment_status = self::ACCEPTED;
    $this->save();
  }

  public function payment_rejected(){
    if ($this->payment_status != self::ACCEPTED)
    {
      $this->payment_status = self::REJECTED;
      $this->save();
    }
  }
}
