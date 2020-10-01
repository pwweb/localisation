<?php

namespace PWWEB\Localisation\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\LanguageRepository;

class Locale
{
    /**
     * Constant for the session key for locale.
     *
     * @const string
     */
    const SESSION_KEY = 'locale';

    /**
     * Repository of languages to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\LanguageRepository
     */
    private $languageRepository;

    /**
     * Constructor for the middleware ensuring dependencies are injected.
     *
     * @param \PWWEB\Localisation\Repositories\LanguageRepository $languageRepo Repository of Languages
     */
    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Locale middleware handler.
     *
     * @param \Illuminate\Http\Request $request current request
     * @param Closure                 $next    Next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = $request->getSession();
        if (null !== $session) {
            if (false === $session->has(self::SESSION_KEY)) {
                $session->put(self::SESSION_KEY, $request->getPreferredLanguage($this->languageRepository->getAllActive()->pluck('locale')->toArray()));
            }

            if (true === $request->has('lang')) {
                $lang = $request->get('lang');
                $check = $this->languageRepository->isLangActive($lang);

                if (false === is_null($check)) {
                    $session->put(self::SESSION_KEY, $check->locale);
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
