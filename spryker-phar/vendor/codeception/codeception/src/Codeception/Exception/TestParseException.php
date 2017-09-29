<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Exception;

use Exception;

class TestParseException extends Exception
{

    public function __construct($fileName, $errors = null)
    {
        $this->message = "Couldn't parse test '$fileName'";
        if ($errors) {
            $this->message .= "\n$errors";
        }
    }

}
