<?php

namespace App\Services;

use App\Utils\Apis\SymfonySkeleton;

class AuthService
{
  public function login($request)
  {
    return SymfonySkeleton::login($request);
  }
}
