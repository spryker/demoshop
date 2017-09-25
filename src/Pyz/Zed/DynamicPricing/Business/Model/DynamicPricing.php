<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\PricingFactorTransfer;
use Orm\Zed\DynamicPricing\Persistence\Base\SpyCustomerPricingFactor;
use Pyz\Shared\DynamicPricing\DynamicPricingConstants;
use Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface;

/**
 * Class DynamicPricing
 * @package Pyz\Zed\DynamicPricing\Business\Model
 */
class DynamicPricing implements DynamicPricingInterface
{

    /**
     * @var \Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface
     */
    private $queryContainer;

    /**
     * DynamicPricing constructor.
     *
     * @param \Pyz\Zed\DynamicPricing\Persistence\DynamicPricingQueryContainerInterface $queryContainer
     */
    public function __construct(DynamicPricingQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer)
    {
        $pricingFactorEntities = $this->getPricingFactorEntities($customerTransfer);
        $customerTransfer->setPricingPercentage(DynamicPricingConstants::DEFAULT_PRICING_FACTOR);
        foreach ($pricingFactorEntities as $pricingFactorEntity) {
            $pricingFactorTransfer = $this->getPricingFactorTransfer($pricingFactorEntity);
            $customerTransfer->addPricingFactor($pricingFactorTransfer);
            $this->adjustPricingPercentage($customerTransfer, $pricingFactorTransfer);
        }

        return $customerTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Generated\Shared\Transfer\PricingFactorTransfer $pricingFactorTransfer
     *
     * @return void
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
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
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
     * @param \Orm\Zed\DynamicPricing\Persistence\Base\SpyCustomerPricingFactor $pricingFactorEntity
     *
     * @return \Generated\Shared\Transfer\PricingFactorTransfer
     */
    private function getPricingFactorTransfer(SpyCustomerPricingFactor $pricingFactorEntity)
    {
        $pricingFactorTransfer = new PricingFactorTransfer();
        $pricingFactorTransfer->setType($pricingFactorEntity->getSpyPricingFactor()->getSpyPricingFactorType()->getName());
        $pricingFactorTransfer->setValue($pricingFactorEntity->getSpyPricingFactor()->getValue());
        $pricingFactorTransfer->setPercentage($pricingFactorEntity->getSpyPricingFactor()->getPercentage());

        return $pricingFactorTransfer;
    }

}
