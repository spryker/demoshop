<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:28
 */

namespace Pyz\Zed\CustomerCoefficient\Business;


use Pyz\Zed\CustomerCoefficient\Business\Model\CustomerCoefficientCalculator;
use Pyz\Zed\CustomerCoefficient\Persistence\CustomerCoefficientQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerCoefficientBusinessFactory
 * @package Pyz\Zed\CustomerCoefficient\Business
 *
 * @method CustomerCoefficientQueryContainerInterface getQueryContainer()
 */
class CustomerCoefficientBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return CustomerCoefficientCalculator
     */
    public function createCustomerCoefficientCalculator()
    {
        return new CustomerCoefficientCalculator(
            $this->getQueryContainer()
        );
    }
}