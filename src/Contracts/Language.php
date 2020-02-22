<?php

namespace PWWeb\Localisation\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Language
{
    /**
     * A language can be applied to countries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function countries(): BelongsToMany;

    /**
     * Find a Language by its name.
     *
     * @param string $name
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findByName(string $name): self;

    /**
     * Find a Language by its id.
     *
     * @param int $id
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findById(int $id): self;

    /**
     * Find a Language by its locale, e.g. en-gb.
     *
     * @param int $id
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findByLocale(string $locale): self;

    /**
     * Find or Create a Language by its name.
     *
     * @param string $name
     *
     * @return Language
     */
    public static function findOrCreate(string $name): self;
}
