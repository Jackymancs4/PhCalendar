<?php

namespace App\Http\Middleware;

use Closure;

class DateMiddleware
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

        if (isset($request->year) && ($request->year < 1970 || $request->year > 3000)) {
            return redirect('date');
        }

        if (isset($request->month) && ($request->month < 1 || $request->month > 12)) {
            return redirect('date/'.$request->year);
        }

        $ndaymonth=date("t", mktime(0, 0, 0, $request->month, 1, $request->year));

        if (isset($request->day) && ($request->day < 1 || $request->day > $ndaymonth)) {
            return redirect('date/'.$request->year.'/'.$request->month);
        }

        return $next($request);
    }
}
