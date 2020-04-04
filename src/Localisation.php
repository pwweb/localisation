<?php

/**
 * PWWEB\Localisation.
 *
 * Localisation Master Class.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use PWWEB\Localisation\Contracts\Language as LanguageContract;
use PWWEB\Localisation\Models\Language;

class Localisation
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Normalized Laravel Version.
     *
     * @var string
     */
    protected $version;

    /**
     * True when this is a Lumen application.
     *
     * @var boolean
     */
    protected $lumen = false;

    /**
     * Constructor.
     *
     * @param \Illuminate\Foundation\Application $app laravel application for further use
     */
    public function __construct($app = null)
    {
        if (null === $app) {
            $app = app();
            //Fallback when $app is not given
        }

        $this->app = $app;
        $this->version = $app->version();
        $this->lumen = Str::contains($this->version, 'Lumen');
    }

    /**
     * Retrieves all active languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection a collection of active languages
     */
    public static function languages(): Collection
    {
        return Language::where('active', 1)->get();
    }

    /**
     * Determines the currently selected locale.
     *
     * @param string $locale (Optional) Locale to be used for language retrieval
     *
     * @return \PWWEB\Localisation\Contracts\Language A language object
     */
    public static function currentLanguage(string $locale = ''): LanguageContract
    {
        $fallbackLocale = config('app.fallback_locale');

        if ('' === $locale) {
            $locale = app()->getLocale();
        } elseif ($locale === $fallbackLocale) {
            $locale = 'en-GB';
        } else {
            $locale = $fallbackLocale.'-'.strtoupper($fallbackLocale);
        }

        try {
            $current = Language::findByLocale($locale);
        } catch (\InvalidArgumentException $e) {
            $current = self::currentLanguage($fallbackLocale);
        }

        return $current;
    }

    /**
     * Renders a language selector / switcher according to view file.
     *
     * @return \Illuminate\Contracts\Support\Renderable language selector / switcher markup
     */
    public static function languageSelector(): Renderable
    {
        $languages = self::languages();
        $current = self::currentLanguage();

        return view('localisation::atoms.languageselector', compact('languages', 'current'));
    }
}
