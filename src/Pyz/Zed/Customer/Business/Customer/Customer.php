<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerOrganizationRoleTableMap;
use Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroupToCustomer;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Spryker\Shared\Kernel\Store;
use \Spryker\Zed\Customer\Business\Customer\Customer as BaseCustomer;
use Spryker\Zed\Customer\Business\Customer\EmailValidatorInterface;
use Spryker\Zed\Customer\Business\Exception\CustomerNotFoundException;
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
     * @param \Spryker\Zed\Customer\Business\Customer\EmailValidatorInterface $emailValidator
     * @param \Spryker\Zed\Customer\Dependency\Facade\CustomerToMailInterface $mailFacade
     * @param \Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface $localeQueryContainer
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(
        CustomerQueryContainerInterface $queryContainer,
        CustomerReferenceGeneratorInterface $customerReferenceGenerator,
        CustomerConfig $customerConfig,
        EmailValidatorInterface $emailValidator,
        CustomerToMailInterface $mailFacade,
        LocaleQueryContainerInterface $localeQueryContainer,
        Store $store
    ) {
        parent::__construct($queryContainer, $customerReferenceGenerator, $customerConfig, $emailValidator, $mailFacade, $localeQueryContainer, $store);
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
        $customerTransfer->setIdOrganization($customerEntity->getIdOrganization());

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
        $customerQuery = null;

        if ($customerTransfer->getIdCustomer()) {
            $customerQuery = $this->queryContainer->queryCustomerById($customerTransfer->getIdCustomer());
        } elseif ($customerTransfer->getEmail()) {
            $customerQuery = $this->queryContainer->queryCustomerByEmail($customerTransfer->getEmail());
        } elseif ($customerTransfer->getRestorePasswordKey()) {
            $customerQuery = $this->queryContainer->queryCustomerByRestorePasswordKey($customerTransfer->getRestorePasswordKey());
        }

        $customerEntity = $customerQuery
            ->joinSpyCustomerGroupToCustomer(null, Criteria::LEFT_JOIN)
            ->addJoin(
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
                SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
                Criteria::LEFT_JOIN
            )
            ->withColumn(SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_GROUP, 'idOrganization')
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

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function add($customerTransfer)
    {
        $customerTransfer = $this->encryptPassword($customerTransfer);

        $customerEntity = new SpyCustomer();
        $customerEntity->fromArray($customerTransfer->toArray());

        $this->addLocale($customerEntity);

        $customerResponseTransfer = $this->createCustomerResponseTransfer();
        $customerResponseTransfer = $this->validateCustomerEmail($customerResponseTransfer, $customerEntity);
        if ($customerResponseTransfer->getIsSuccess() !== true) {
            return $customerResponseTransfer;
        }

        $customerEntity->setCustomerReference($this->customerReferenceGenerator->generateCustomerReference($customerTransfer));
        $customerEntity->setRegistrationKey($this->generateKey());

        $customerEntity->save();

        $customerTransfer->setIdCustomer($customerEntity->getPrimaryKey());
        $customerTransfer->setCustomerReference($customerEntity->getCustomerReference());
        $customerTransfer->setRegistrationKey($customerEntity->getRegistrationKey());

        if($customerTransfer->getIdOrganization()) {
            $roleId = $this->queryContainer->queryCustomerOrganizationRoleByName($customerTransfer->getOrganizationRole())->findOne();
            $customerGroupToCustomerEntity = new SpyCustomerGroupToCustomer();
            $customerGroupToCustomerEntity->setFkCustomerGroup($customerTransfer->getIdOrganization());
            $customerGroupToCustomerEntity->setFkCustomer($customerTransfer->getIdCustomer());
            $customerGroupToCustomerEntity->setFkCustomerOrganizationRole($roleId->getIdCustomerOrganizationRole());

            $customerGroupToCustomerEntity->save();
        }

        $customerResponseTransfer
            ->setIsSuccess(true)
            ->setCustomerTransfer($customerTransfer);

        return $customerResponseTransfer;
    }
}
