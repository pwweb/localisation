<?php

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
     * @var bool
     */
    protected $lumen = false;

    /**
     * @param Application $app
     */
    public function __construct($app = null)
    {
        if (!$app) {
            $app = app();   //Fallback when $app is not given
        }

        $this->app = $app;
        $this->version = $app->version();
        $this->lumen = Str::contains($this->version, 'Lumen');
    }

    public static function languages(): Collection
    {
        return Language::where('active', 1)->get();
    }

    public static function currentLanguage(string $locale = '')
    {
        $fallbackLocale = config('app.fallback_locale');

        if ($locale === '') {
            $locale = app()->getLocale();
        } elseif ($locale === $fallbackLocale) {
            $locale = 'en-gb';
        } else {
            $locale = $fallbackLocale.'-'.$fallbackLocale;
        }

        try {
            $current = Language::findByLocale($locale);
        } catch (\InvalidArgumentException $e) {
            $current = self::currentLanguage($fallbackLocale);
        }

        return $current;
    }

    public static function languageSelector(): Renderable
    {
        $languages = self::languages();
        $current   = self::currentLanguage();

        return view('localisation::atoms.languageselector', compact('languages', 'current'));
    }
}
