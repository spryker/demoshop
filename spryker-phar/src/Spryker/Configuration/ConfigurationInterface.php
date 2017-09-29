<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration;

use Spryker\Configuration\Stage\StageInterface;

interface ConfigurationInterface
{

    /**
     * @param \Spryker\Configuration\Stage\StageInterface $stage
     *
     * @return mixed
     */
    public function addStage(StageInterface $stage);

    /**
     * @return \Spryker\Configuration\Stage\StageInterface[]
     */
    public function getStages();

}
