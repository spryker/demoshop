<?php

namespace Pyz\Zed\DataImport\Business\Model\Customer;

use Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CustomerOrganizationRoleWriterStep implements DataImportStepInterface
{
    const ROLE = 'role';
    const DEFAULT_FIELD = 'default';
    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $customerOrganizationRole = SpyCustomerOrganizationRoleQuery::create()
            ->filterByRole($dataSet[static::ROLE])
            ->filterByDefault($dataSet[static::DEFAULT_FIELD])
            ->findOneOrCreate();

        $customerOrganizationRole->save();
    }
}
