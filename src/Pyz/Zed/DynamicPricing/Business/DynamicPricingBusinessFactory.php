<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Business;

use Pyz\Zed\DynamicPricing\Business\Model\DynamicPricing;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class DynamicPricingBusinessFactory
 * @package Pyz\Zed\DynamicPricing\Business
 *
 * @method \Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface getQueryContainer()
 */
class DynamicPricingBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return \Pyz\Zed\DynamicPricing\Business\Model\DynamicPricing
     */
    public function createDynamicPricing()
    {
        return new DynamicPricing(
            $this->getQueryContainer()
        );
    }

}
