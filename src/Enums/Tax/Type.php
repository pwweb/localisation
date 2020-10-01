<?php

namespace PWWEB\Localisation\Enums\Tax;

use Spatie\Enum\Enum;

/**
 * PWWEB\Localisation\Enums\Tax\Type Enum.
 *
 * Standard Tax Type Enum.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @method    static self none()
 * @method    static self standard()
 * @method    static self reduced()
 * @method    static self zero()
 */
abstract class Type extends Enum
{
    /**
     * No type for the Tax.
     *
     * @return Type
     */
    public static function none(): self
    {
        return new class() extends Type {
            // phpcs:ignore
            public function getIndex(): int
            {
                return 0;
            }

            // phpcs:ignore
            public function getValue(): string
            {
                $value = __('');

                if (true === is_array($value)) {
                    $value = (string) $value[0];
                }

                return $value ?: '';
            }
        };
    }

    /**
     * Standard Rate type for the Tax.
     *
     * @return Type
     */
    public static function standard(): self
    {
        return new class() extends Type {
            // phpcs:ignore
            public function getIndex(): int
            {
                return 1;
            }

            // phpcs:ignore
            public function getValue(): string
            {
                $value = __('pwweb::localisation.tax.rates.standard_rate');

                if (true === is_array($value)) {
                    $value = (string) $value[0];
                }

                return $value ?: '';
            }
        };
    }

    /**
     * Reduced Rate type for the Tax.
     *
     * @return Type
     */
    public static function reduced(): self
    {
        return new class() extends Type {
            // phpcs:ignore
            public function getIndex(): int
            {
                return 2;
            }

            // phpcs:ignore
            public function getValue(): string
            {
                $value = __('pwweb::localisation.tax.rates.reduced_rate');

                if (true === is_array($value)) {
                    $value = (string) $value[0];
                }

                return $value ?: '';
            }
        };
    }

    /**
     * Zero Rate type for the Tax.
     *
     * @return Type
     */
    public static function zero(): self
    {
        return new class() extends Type {
            // phpcs:ignore
            public function getIndex(): int
            {
                return 3;
            }

            // phpcs:ignore
            public function getValue(): string
            {
                $value = __('pwweb::localisation.tax.rates.zero_rate');

                if (true === is_array($value)) {
                    $value = (string) $value[0];
                }

                return $value ?: '';
            }
        };
    }
}
