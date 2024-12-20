<?php

namespace App\Http\Middleware;

use App\Http\Controllers\apiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role!='Admin') {
            return $this->apiResponse(null,'the user not admin',403);
        }
        return $next($request);
    }
}
