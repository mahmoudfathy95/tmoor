<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 21/10/18
 * Time: 11:01 ص
 */

namespace Modules\CommonModule\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

trait ApiAuthHelper
{


  function doLogin($credentials)
  {
      $jwt_token = null;
      if (!$jwt_token = JWTAuth::attempt($credentials)) {
          return false;
      }
      return $jwt_token;
  }

  function getAuthUser()
  {
      $user = Auth::user();
      return $user;
  }

}
