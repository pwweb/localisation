<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use PWWEB\Localisation\Middleware\Locale;
use PWWEB\Localisation\Models\Language;

class LanguageController extends Controller
{
    /**
     * Switch the locale.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function switch($locale)
    {
        $locales = (array) Language::getLocales();

        // If a locale does not match any of the ones allowed, go back without doing anything.
        if (false === in_array($locale, $locales)) {
            return redirect()->back();
        }

        // Set the right sessions.
        session([Locale::SESSION_KEY => $locale]);
        app()->setLocale($locale);
        // \LangCountry::setAllSessions($lang_country);

        // If a user is logged in and it has a lang_country property, set the new lang_country.
        /*
         * Todo Set language to user options
         * if (Auth::user() && array_key_exists('lang_country', Auth::user()->getAttributes())) {
         *
            try {
                \Auth::user()->lang_country = $lang_country;
                \Auth::user()->save();
            } catch (\Exception $e) {
                \Log::error(get_class($this).' at '.__LINE__.': '.$e->getMessage());
            }
        }*/

        return redirect()->back();
    }
}
