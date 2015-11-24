<?php

namespace Pyz\Zed\Customer\Business\Model;

use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;

interface MagentoPasswordManagerInterface
{
    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function migratePassword(CustomerMagentoPasswordMigrationInterface $customerTransfer);

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function hasMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerTransfer);
}
