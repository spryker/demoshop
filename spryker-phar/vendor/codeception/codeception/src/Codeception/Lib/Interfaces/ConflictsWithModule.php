<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Interfaces;

interface ConflictsWithModule
{

    /**
     * Returns class name or interface of module which can conflict with current.
     *
     * @return string
     */
    public function _conflicts();

}
