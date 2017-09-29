<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Command;

interface CommandInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getExecutable();

}
