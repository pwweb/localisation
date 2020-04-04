<?php

namespace PWWEB\Localisation\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Constant for the session key for locale.
     *
     * @const string
     */
    const SESSION_KEY = 'locale';

    /**
     * Locale middleware handler.
     *
     * @param Illuminate\Http\Request $request current request
     * @param Closure                 $next    Next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = $request->getSession();

        if (null !== $session) {
            if (true === $session->has(self::SESSION_KEY)) {
                $session->put(self::SESSION_KEY, $request->getPreferredLanguage(self::LOCALES));
            }

            if (true === $request->has('lang')) {
                $lang = $request->get('lang');
                $locales = (array) Language::getLocales();

                if (true === in_array($lang, $locales)) {
                    $session->put(self::SESSION_KEY, $lang);
                }
            }

            app()->setLocale($session->get(self::SESSION_KEY));

            return $next($request);
        }

        $lang = $request->server('HTTP_ACCEPT_LANGUAGE');

        app()->setLocale($lang);

        return $next($request);
    }
}
