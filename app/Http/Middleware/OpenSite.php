<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OpenSite
{
    public function handle(Request $request, Closure $next)
    {
        if(setting()->system_status == 'open')
        {
            if(request()->segment(1) == 'siteStatus')
            {
                return redirect()->route('web.index');
            }

        }
        return $next($request);
    }
}
