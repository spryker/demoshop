<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Stage;

use Spryker\Configuration\Section\SectionInterface;

interface StageConfigurationInterface
{

    /**
     * @param \Spryker\Configuration\Section\SectionInterface $section
     *
     * @return $this
     */
    public function addSection(SectionInterface $section);

}
