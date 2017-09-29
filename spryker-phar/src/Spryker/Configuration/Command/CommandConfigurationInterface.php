<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Command;

interface CommandConfigurationInterface
{

    /**
     * @param string $executable
     *
     * @return $this
     */
    public function setExecutable($executable);

}
