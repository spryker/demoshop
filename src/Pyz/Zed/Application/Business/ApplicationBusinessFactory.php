<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Application\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Application\Business\ApplicationBusinessFactory as SprykerApplicationBusinessFactory;

/**
 * @method \Spryker\Zed\Application\ApplicationConfig getConfig()
 */
class ApplicationBusinessFactory extends SprykerApplicationBusinessFactory
{

    /**
     * @param \Psr\Log\LoggerInterface|null $logger
     *
     * @return \Spryker\Zed\Application\Business\Model\ApplicationCheckStep\AbstractApplicationCheckStep[]
     */
    public function getCheckSteps(LoggerInterface $logger = null)
    {
        return parent::getCheckSteps($logger);
    }

}
