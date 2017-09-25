<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 21:55
 */

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface;
use Spryker\Zed\Customer\Business\Customer\Customer as SprykerCustomer;
use Spryker\Shared\Kernel\Store;
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
     * @var DynamicPricingFacadeInterface
     */
    private $dynamicPricingFacade;

    /**
     * Customer constructor.
     * @param CustomerQueryContainerInterface $queryContainer
     * @param CustomerReferenceGeneratorInterface $customerReferenceGenerator
     * @param CustomerConfig $customerConfig
     * @param CustomerToMailInterface $mailFacade
     * @param LocaleQueryContainerInterface $localeQueryContainer
     * @param Store $store
     * @param DynamicPricingFacadeInterface $dynamicPricingFacade
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
     * @param CustomerTransfer $customerTransfer
     * @return CustomerTransfer
     */
    public function get(CustomerTransfer $customerTransfer)
    {
        $customerTransfer = parent::get($customerTransfer);
        $customerTransfer = $this->dynamicPricingFacade->attachPricingFactors($customerTransfer);

        return $customerTransfer;
    }
}