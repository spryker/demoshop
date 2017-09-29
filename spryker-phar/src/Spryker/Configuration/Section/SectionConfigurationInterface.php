<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Section;

use Spryker\Configuration\Command\CommandInterface;

interface SectionConfigurationInterface
{

    /**
     * @param \Spryker\Configuration\Command\CommandInterface $command
     *
     * @return $this
     */
    public function addCommand(CommandInterface $command);

}
