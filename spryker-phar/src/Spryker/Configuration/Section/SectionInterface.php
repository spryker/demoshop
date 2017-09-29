<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Section;

interface SectionInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return \Spryker\Configuration\Command\CommandInterface[]
     */
    public function getCommands();

}
