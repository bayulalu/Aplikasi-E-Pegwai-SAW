<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class bukankadisMiddleware
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
        $user = $request->user();
        // dd($user);
           
        if ($user->eslon > 2) {
            return $next($request);
        
        }
        return redirect()->route('listJob');
        
    }
}
