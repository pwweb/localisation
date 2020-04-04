<?php

namespace PWWEB\Localisation\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Country
{
    /**
     * A country can have multiple languages.
     */
    public function languages(): HasMany;
}
