<?php
 
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMidlleware{

    public function handle(Request $request , Closure $next): Response
    {
        if(Auth::check() && Auth::user()->admin == 1)
        {
            return $next($request);  
        }
        
        return redirect()->route('home');
    }
}
