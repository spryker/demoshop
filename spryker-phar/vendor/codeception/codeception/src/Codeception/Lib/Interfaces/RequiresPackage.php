<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Interfaces;

interface RequiresPackage
{

    /**
     * Returns list of classes and corresponding packages required for this module
     */
    public function _requires();

}
