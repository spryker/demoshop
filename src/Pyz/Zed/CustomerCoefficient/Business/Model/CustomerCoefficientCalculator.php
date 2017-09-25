<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:26
 */

namespace Pyz\Zed\CustomerCoefficient\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\CustomerCoefficient\Persistence\CustomerCoefficientQueryContainerInterface;

class CustomerCoefficientCalculator implements CustomerCoefficientCalculatorInterface
{
    /**
     * @var CustomerCoefficientQueryContainerInterface
     */
    private $queryContainer;

    public function __construct(CustomerCoefficientQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @return float
     */
    public function getCustomerCoefficient(CustomerTransfer $customerTransfer)
    {
        return $this
            ->queryContainer
            ->queryCustomerCoefficientByCustomerId($customerTransfer->getIdCustomer())
            ->findOne()
            ->getValue();
    }
}