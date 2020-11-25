<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    use ApiResponseHelper;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            
            $user = JWTAuth::parseToken()->authenticate();
            // dd($user);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->setCode(400)->setError('Token is Expired')->send();
//                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->setCode(400)->setError('Token is Expired')->send();
//                return response()->json(['status' => 'Token is Expired']);
            }else{
                return $this->setCode(400)->setError('Authorization Token not found')->send();
//                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
