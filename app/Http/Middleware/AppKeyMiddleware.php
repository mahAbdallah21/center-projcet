<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->header('x-key')){
            if ($request->header('x-key') === env('PRODUCT_KEY')) {
                return $next($request);
            }else{
                return response()->json([
                    'message' => 'Invalid PROUDCT KEY'
                ],401);
            }
        }else{
            return response()->json([
                'message' => 'PROUDCT KEY Required'
            ],401);
        }

    }
}
