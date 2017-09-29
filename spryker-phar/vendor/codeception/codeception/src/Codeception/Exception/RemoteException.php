<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Exception;

use Exception;

class RemoteException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
        $this->message = "Remote Application Error:\n" . $this->message;
    }

}
