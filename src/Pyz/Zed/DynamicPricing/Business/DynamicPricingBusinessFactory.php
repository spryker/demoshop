<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:50
 */

namespace Pyz\Zed\DynamicPricing\Business;

use Pyz\Zed\DynamicPricing\Business\Model\DynamicPricing;
use Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class DynamicPricingBusinessFactory
 * @package Pyz\Zed\DynamicPricing\Business
 *
 * @method DynamicPricingQueryContainerInterface getQueryContainer()
 */
class DynamicPricingBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return DynamicPricing
     */
    public function createDynamicPricing()
    {
        return new DynamicPricing(
            $this->getQueryContainer()
        );
    }
}