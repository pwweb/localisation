<?php

namespace PWWeb\Localisation\Exceptions;

use InvalidArgumentException;

class LanguageDoesNotExist extends InvalidArgumentException
{
    public static function create(string $languageName)
    {
        return new static("There is no language named `{$languageName}`.");
    }

    public static function withId(int $languageId)
    {
        return new static("There is no [language] with id `{$languageId}`.");
    }
}