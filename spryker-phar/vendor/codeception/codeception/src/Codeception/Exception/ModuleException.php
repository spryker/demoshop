<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Exception;

use Exception;

class ModuleException extends Exception
{

    protected $module;

    public function __construct($module, $message)
    {
        if (is_object($module)) {
            $module = get_class($module);
        }
        $module = ltrim(str_replace('Codeception\Module\\', '', $module), '\\');
        $this->module = $module;
        parent::__construct($message);
        $this->message = "$module: {$this->message}";
    }

}
