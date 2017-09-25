<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:51
 */

namespace Pyz\Zed\DynamicPricing\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PricingFactorTransfer;
use Orm\Zed\DynamicPricing\Persistence\Base\SpyCustomerPricingFactor;
use Orm\Zed\DynamicPricing\Persistence\SpyPricingFactor;
use Pyz\Shared\DynamicPricing\DynamicPricingConstants;
use Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface;

class DynamicPricing implements DynamicPricingInterface
{
    /**
     * @var DynamicPricingQueryContainerInterface
     */
    private $queryContainer;

    /**
     * DynamicPricing constructor.
     * @param DynamicPricingQueryContainerInterface $queryContainer
     */
    public function __construct(DynamicPricingQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @return CustomerTransfer $customerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer)
    {
        $pricingFactorEntities = $this->getPricingFactorEntities($customerTransfer);
        $customerTransfer->setPricingPercentage(DynamicPricingConstants::DEFAULT_PRICING_FACTOR);
        foreach($pricingFactorEntities as $pricingFactorEntity) {
            $pricingFactorTransfer = $this->getPricingFactorTransfer($pricingFactorEntity);
            $customerTransfer->addPricingFactor($pricingFactorTransfer);
            $this->adjustPricingPercentage($customerTransfer, $pricingFactorTransfer);
        }

        return $customerTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @param PricingFactorTransfer $pricingFactorTransfer
     * @return float
     */
    private function adjustPricingPercentage(
        CustomerTransfer $customerTransfer,
        PricingFactorTransfer $pricingFactorTransfer
    ) {
        $customerTransfer->setPricingPercentage(
            $customerTransfer->getPricingPercentage() * $pricingFactorTransfer->getPercentage()
        );
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @return \Orm\Zed\DynamicPricing\Persistence\SpyCustomerPricingFactor[]|\Propel\Runtime\Collection\ObjectCollection
     */
    private function getPricingFactorEntities(CustomerTransfer $customerTransfer)
    {
        return $this
            ->queryContainer
            ->queryPricingFactorsByCustomerId($customerTransfer->getIdCustomer())
            ->find();
    }

/**
 * @param SpyCustomerPricingFactor $pricingFactorEntity
 * @return PricingFactorTransfer
 */
    private function getPricingFactorTransfer(SpyCustomerPricingFactor $pricingFactorEntity)
    {
        $pricingFactorTransfer = new PricingFactorTransfer();
        $pricingFactorTransfer->setType('Type');
        $pricingFactorTransfer->setValue($pricingFactorEntity->getSpyPricingFactor()->getValue());
        $pricingFactorTransfer->setPercentage($pricingFactorEntity->getSpyPricingFactor()->getPercentage());

        return $pricingFactorTransfer;
    }

}