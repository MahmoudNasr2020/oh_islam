<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class siteStatue
{
    public function handle(Request $request, Closure $next)
    {
        if(setting()->system_status == 'close')
        {
            return redirect()->route('web.status');
        }
        return $next($request);
    }
}
