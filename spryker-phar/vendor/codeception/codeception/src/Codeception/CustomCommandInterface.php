<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception;

interface CustomCommandInterface
{

    /**
     * returns the name of the command
     *
     * @return string
     */
    public static function getCommandName();

}
