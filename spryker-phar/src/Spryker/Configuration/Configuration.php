<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration;

use Spryker\Configuration\Exception\StageExistsException;
use Spryker\Configuration\Stage\StageInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @var \Spryker\Configuration\Stage\StageInterface[]
     */
    protected $stages = [];

    /**
     * @param \Spryker\Configuration\Stage\StageInterface $stage
     *
     * @throws \Spryker\Configuration\Exception\StageExistsException
     *
     * @return $this
     */
    public function addStage(StageInterface $stage)
    {
        if (isset($this->stages[$stage->getName()])) {
            throw new StageExistsException(sprintf('Stage with name "%s" already exists', $stage->getName()));
        }

        $this->stages[$stage->getName()] = $stage;

        return $this;
    }

    /**
     * @return array
     */
    public function getStages()
    {
        return $this->stages;
    }

}
