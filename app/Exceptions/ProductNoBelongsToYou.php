<?php

namespace App\Exceptions;

use Exception;

class ProductNoBelongsToYou extends Exception
{
  public function render()
  {
    return ['errors' => 'This Product Not Belongs To You'];
  }
}
