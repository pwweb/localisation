<?php

/**
 * PWWeb\Localisation
 *
 * Localisation Master Class.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;

use PWWeb\Exceptions\LanguageDoesNotExist;
use PWWeb\Localisation\Models\Language;

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
     * Constructor
     *
     * @param Application $app Laravel application for further use.
     */
    public function __construct($app = null)
    {
        if ($app === null) {
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
     * @return Collection A collection of active languages.
     */
    public static function languages(): Collection
    {
        return Language::where('active', 1)->get();
    }

    /**
     * Determines the currently selected locale.
     *
     * @param string $locale (Optional) Locale to be used for language retrieval.
     *
     * @return LanguageContract A language object
     */
    public static function currentLanguage(string $locale = ''): LanguageContract
    {
        $fallbackLocale = config('app.fallback_locale');

        if ($locale === '') {
            $locale = app()->getLocale();
        } else if ($locale === $fallbackLocale) {
            $locale = 'en-gb';
        } else {
            $locale = $fallbackLocale . '-' . $fallbackLocale;
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
     * @return Renderable Language selector / switcher markup.
     */
    public static function languageSelector(): Renderable
    {
        $languages = self::languages();
        $current   = self::currentLanguage();

        return view('localisation::atoms.languageselector', compact('languages', 'current'));
    }
}
