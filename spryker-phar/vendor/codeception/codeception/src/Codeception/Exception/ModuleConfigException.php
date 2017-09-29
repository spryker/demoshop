<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Exception;

use Exception;

class ModuleConfigException extends Exception
{

    public function __construct($module, $message, Exception $previous = null)
    {
        if (is_object($module)) {
            $module = get_class($module);
        }
        $module = str_replace('Codeception\Module\\', '', ltrim($module, '\\'));
        parent::__construct($message, 0, $previous);
        $this->message = $module . " module is not configured!\n \n" . $this->message;
    }

}
