<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication;

use Generated\Shared\Transfer\CustomerGroupTransfer;
use Pyz\Zed\CustomerOrganization\Communication\Form\CustomerAssignmentForm;
use Pyz\Zed\CustomerOrganization\Communication\Form\CustomerOrganizationForm;
use Pyz\Zed\CustomerOrganization\Communication\Form\DataProvider\CustomerOrganizationFormDataProvider;
use Pyz\Zed\CustomerOrganization\Communication\Table\Assignment\AssignedCustomerTable;
use Pyz\Zed\CustomerOrganization\Communication\Table\Assignment\AssignmentCustomerQueryBuilder;
use Pyz\Zed\CustomerOrganization\Communication\Table\Assignment\AvailableCustomerTable;
use Pyz\Zed\CustomerOrganization\Communication\Table\CustomerOrganizationTable;
use Pyz\Zed\CustomerOrganization\Communication\Tabs\CustomerOrganizationFormTabs;
use Pyz\Zed\CustomerOrganization\CustomerOrganizationDependencyProvider;
use \Spryker\Zed\CustomerGroup\Communication\CustomerGroupCommunicationFactory as BaseCustomerGroupCommunicationFactory;
use Pyz\Zed\CustomerOrganization\Communication\Table\CustomerTable;


class CustomerOrganizationCommunicationFactory extends BaseCustomerGroupCommunicationFactory
{
    /**
     * @return \Spryker\Zed\CustomerGroup\Communication\Table\CustomerGroupTable
     */
    public function createCustomerGroupTable()
    {
        return new CustomerOrganizationTable(
            $this->getQueryContainer(),
            $this->getDateFormatterService()
        );
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer
     *
     * @return \Spryker\Zed\CustomerGroup\Communication\Table\CustomerTable
     */
    public function createCustomerTable(CustomerGroupTransfer $customerGroupTransfer)
    {
        return new CustomerTable(
            $this->getQueryContainer(),
            $customerGroupTransfer
        );
    }

    /**
     * @param int|null $idCustomerGroup
     *
     * @return \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AssignedCustomerTable
     */
    public function createAssignedCustomerTable($idCustomerGroup = null)
    {
        return new AssignedCustomerTable(
            $this->createAssignmentCustomerQueryBuilder(),
            $this->getUtilEncodingService(),
            $idCustomerGroup
        );
    }

    /**
     * @param int|null $idCustomerGroup
     *
     * @return \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AvailableCustomerTable
     */
    public function createAvailableCustomerTable($idCustomerGroup = null)
    {
        return new AvailableCustomerTable(
            $this->createAssignmentCustomerQueryBuilder(),
            $this->getUtilEncodingService(),
            $idCustomerGroup
        );
    }

    /**
     * @return \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AssignmentCustomerQueryBuilder
     */
    protected function createAssignmentCustomerQueryBuilder()
    {
        return new AssignmentCustomerQueryBuilder(
            $this->getCustomerQueryContainer()
        );
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface
     */
    protected function createCustomerAssignmentFormType()
    {
        return new CustomerAssignmentForm();
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $data
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createCustomerGroupForm(CustomerGroupTransfer $data, array $options = [])
    {
        $customerFormType = new CustomerOrganizationForm(
            $this->getQueryContainer(),
            $this->createCustomerAssignmentFormType(),
            $data->getIdCustomerGroup()
        );

        return $this->getFormFactory()->create($customerFormType, $data, $options);
    }

    /**
     * @return \Spryker\Zed\Gui\Communication\Tabs\TabsInterface
     */
    public function createCustomerGroupFormTabs()
    {
        return new CustomerOrganizationFormTabs();
    }

    /**
     * @return \Spryker\Zed\CustomerGroup\Communication\Form\DataProvider\CustomerGroupFormDataProvider
     */
    public function createCustomerGroupFormDataProvider()
    {
        return new CustomerOrganizationFormDataProvider($this->getQueryContainer());
    }

    /**
     * @return \Spryker\Service\UtilDateTime\UtilDateTimeServiceInterface
     */
    protected function getDateFormatterService()
    {
        return $this->getProvidedDependency(CustomerOrganizationDependencyProvider::SERVICE_DATE_FORMATTER);
    }

    /**
     * @return \Spryker\Zed\CustomerGroup\Dependency\QueryContainer\CustomerGroupToCustomerQueryContainerInterface
     */
    protected function getCustomerQueryContainer()
    {
        return $this->getProvidedDependency(CustomerOrganizationDependencyProvider::QUERY_CONTAINER_CUSTOMER);
    }

    /**
     * @return \Spryker\Zed\CustomerGroup\Dependency\Service\CustomerGroupToUtilEncodingInterface
     */
    protected function getUtilEncodingService()
    {
        return $this->getProvidedDependency(CustomerOrganizationDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
