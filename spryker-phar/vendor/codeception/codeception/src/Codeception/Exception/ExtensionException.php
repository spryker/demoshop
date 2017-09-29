<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Exception;

use Exception;

class ExtensionException extends Exception
{

    public function __construct($extension, $message, Exception $previous = null)
    {
        parent::__construct($message, $previous);
        if (is_object($extension)) {
            $extension = get_class($extension);
        }
        $this->message = $extension . "\n\n" . $this->message;
    }

}
