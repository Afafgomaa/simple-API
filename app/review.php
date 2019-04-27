<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
  protected $fillable  = ['customer' , 'star', 'review'];
  public function product()
  {
    return $this->belongsTo('App\product');
  }
}
