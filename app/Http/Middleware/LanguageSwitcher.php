<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LanguageSwitcher
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
    	$session = session('locale');
    	if (!in_array($session, Config::get('app.locales'))) {
    		$session = Config::get('app.locale');
		}

    	App::setLocale($session);

        return $next($request);
    }
}
