<?php


namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 */
trait exceptionTrait
{
  function apiException($r,$e)
  {
    if ($this->isModel($e)) {
      return $this->resopnseModel();
    }
        if ($this->ishttp($e)) {
          return $this->resopnseHttp();
        }
            return parent::render($r, $e);
  }





  protected function isModel($e)
  {
    return $e instanceof ModelNotFoundException;
  }

  protected function ishttp($e)
  {
    return $e instanceof NotFoundHttpException;
  }

  protected function resopnseHttp()
  {
    return response()->json([
      'error' => 'Http not found'
    ], Response::HTTP_NOT_FOUND);
  }

  protected function resopnseModel()
  {
    return response()->json([
      'error' => 'Resource not found'
    ],Response::HTTP_NOT_FOUND);
  }


}
