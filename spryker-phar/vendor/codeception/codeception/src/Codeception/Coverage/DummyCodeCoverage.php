<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Coverage;

use PHP_CodeCoverage;

class DummyCodeCoverage extends PHP_CodeCoverage
{

    /**
     * @return void
     */
    public function start($id, $clear = false)
    {
    }

    /**
     * @return void
     */
    public function stop($append = true, $linesToBeCovered = [], array $linesToBeUsed = [])
    {
    }

}
