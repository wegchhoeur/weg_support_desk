<?php

namespace App\Http\Middleware;

use Closure;
use App\Language;

class Localization
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
       $language = Language::where('default', '1')->first();
       
       if(isset($language->code))
       {
           \App::setlocale($language->code);
       }
       return $next($request);
    }
}
