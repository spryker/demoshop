<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Spryker\Shared\Kernel\Store;
use \Spryker\Zed\Customer\Business\Customer\Customer as BaseCustomer;
use Spryker\Zed\Customer\Business\ReferenceGenerator\CustomerReferenceGeneratorInterface;
use Spryker\Zed\Customer\CustomerConfig;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToMailInterface;
use Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface;

class Customer extends BaseCustomer
{
    /**
     * @var \Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param \Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\Customer\Business\ReferenceGenerator\CustomerReferenceGeneratorInterface $customerReferenceGenerator
     * @param \Spryker\Zed\Customer\CustomerConfig $customerConfig
     * @param \Spryker\Zed\Customer\Dependency\Facade\CustomerToMailInterface $mailFacade
     * @param \Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface $localeQueryContainer
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(
        CustomerQueryContainerInterface $queryContainer,
        CustomerReferenceGeneratorInterface $customerReferenceGenerator,
        CustomerConfig $customerConfig,
        CustomerToMailInterface $mailFacade,
        LocaleQueryContainerInterface $localeQueryContainer,
        Store $store
    ) {
        parent::__construct($queryContainer, $customerReferenceGenerator, $customerConfig, $mailFacade, $localeQueryContainer, $store);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function get(CustomerTransfer $customerTransfer)
    {
        $customerEntity = $this->getCustomer($customerTransfer);
        $customerTransfer->fromArray($customerEntity->toArray(), true);
        $customerTransfer->setOrganizationRole($customerEntity->getRole());

        $customerTransfer = $this->attachAddresses($customerTransfer, $customerEntity);

        return $customerTransfer;
    }
}
