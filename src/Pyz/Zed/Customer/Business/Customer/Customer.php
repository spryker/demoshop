<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerOrganizationRoleTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
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

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @throws \Spryker\Zed\Customer\Business\Exception\CustomerNotFoundException
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomer
     */
    protected function getCustomer(CustomerTransfer $customerTransfer)
    {
        $customerEntity = null;

        if ($customerTransfer->getIdCustomer()) {
            $customerEntity = $this->queryContainer->queryCustomerById($customerTransfer->getIdCustomer());
        } elseif ($customerTransfer->getEmail()) {
            $customerEntity = $this->queryContainer->queryCustomerByEmail($customerTransfer->getEmail());
        } elseif ($customerTransfer->getRestorePasswordKey()) {
            $customerEntity = $this->queryContainer->queryCustomerByRestorePasswordKey($customerTransfer->getRestorePasswordKey());
        }

        $customerEntity = $customerEntity->useSpyCustomerGroupToCustomerQuery()
            ->addJoin(
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
                SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
                Criteria::LEFT_JOIN
            )
            ->endUse()
            ->withColumn(SpyCustomerOrganizationRoleTableMap::COL_ROLE, 'role')
            ->findOne();


        if ($customerEntity !== null) {
            return $customerEntity;
        }

        throw new CustomerNotFoundException(sprintf(
            'Customer not found by either ID `%s`, email `%s` or restore password key `%s`.',
            $customerTransfer->getIdCustomer(),
            $customerTransfer->getEmail(),
            $customerTransfer->getRestorePasswordKey()
        ));
    }
}
