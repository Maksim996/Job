<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
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
        $localeKey = 'locale';
        $settedLocale = App::getLocale();
        $newLocale = $request->cookie($localeKey);
        $allowedLocale = ['ua', 'ru', 'us'];
        $locale = null;

        if(!$newLocale) {
            $locale = $settedLocale;
        }
        else {
            $locale = in_array($newLocale, $allowedLocale) ? $newLocale : $settedLocale;
        }

        App::setLocale($locale);
        $request['locale'] = $locale;

        return $next($request);
    }
}
