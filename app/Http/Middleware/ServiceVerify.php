<?php

namespace App\Http\Middleware;

use Closure;

class ServiceVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = md5(config('app.app_id'));

        $response = false;

        if (!$response) {
            if ($request->expectsJson()) {
                return response()->json(['message' => '对不起，你有没有权限访问该资源'], 403);
            }

            abort(403);
        }

        return $next($request);
    }
}
