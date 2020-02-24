<?php

/**
 * PWWeb\Localisation\Exceptions.
 *
 * Address does not exist exception.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Exceptions;

use InvalidArgumentException;

class AddressDoesNotExist extends InvalidArgumentException
{
    /**
     * Creates an exception with an error message based on the address name.
     *
     * @param string $addressName the address name
     *
     * @return static
     */
    public static function create(string $addressName)
    {
        return new static("There is no address named `{$addressName}`.");
    }

    /**
     * Creates an exception with an error message based on the address ID.
     *
     * @param int $addressId the address ID which does not exist in the database
     *
     * @return static
     */
    public static function withId(int $addressId)
    {
        return new static("There is no [address] with id `{$addressId}`.");
    }
}
