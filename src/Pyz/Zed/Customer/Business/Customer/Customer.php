<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Customer\Business\Customer\Customer as SprykerCustomer;
use Spryker\Zed\Customer\Business\ReferenceGenerator\CustomerReferenceGeneratorInterface;
use Spryker\Zed\Customer\CustomerConfig;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToMailInterface;
use Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface;

/**
 * Class Customer
 * @package Pyz\Zed\Customer\Business\Customer
 */
class Customer extends SprykerCustomer
{

    /**
     * @var \Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface
     */
    private $dynamicPricingFacade;

    /**
     * Customer constructor.
     *
     * @param \Spryker\Zed\Customer\Persistence\CustomerQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\Customer\Business\ReferenceGenerator\CustomerReferenceGeneratorInterface $customerReferenceGenerator
     * @param \Spryker\Zed\Customer\CustomerConfig $customerConfig
     * @param \Spryker\Zed\Customer\Dependency\Facade\CustomerToMailInterface $mailFacade
     * @param \Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface $localeQueryContainer
     * @param \Spryker\Shared\Kernel\Store $store
     * @param \Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface $dynamicPricingFacade
     */
    public function __construct(
        CustomerQueryContainerInterface $queryContainer,
        CustomerReferenceGeneratorInterface $customerReferenceGenerator,
        CustomerConfig $customerConfig,
        CustomerToMailInterface $mailFacade,
        LocaleQueryContainerInterface $localeQueryContainer,
        Store $store,
        DynamicPricingFacadeInterface $dynamicPricingFacade
    ) {
        parent::__construct(
            $queryContainer,
            $customerReferenceGenerator,
            $customerConfig,
            $mailFacade,
            $localeQueryContainer,
            $store
        );
        $this->dynamicPricingFacade = $dynamicPricingFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function get(CustomerTransfer $customerTransfer)
    {
        $customerTransfer = parent::get($customerTransfer);
        $customerTransfer = $this->dynamicPricingFacade->attachPricingFactors($customerTransfer);

        return $customerTransfer;
    }

}
