<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
  public function product()
  {
    return $this->belongsTo('App\product');
  }
}
