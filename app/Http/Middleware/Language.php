<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        } else {
            // If no locale is set in the session, use the browser's preferred language
            $locale = $request->getPreferredLanguage(['en', 'fr']); // replace with your supported languages
            App::setLocale($locale);
            session()->put('localeDB', $locale != 'en' ? "_$locale" : '');
        }
        return $next($request);
    }
}