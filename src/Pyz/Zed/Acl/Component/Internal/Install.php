<?php

namespace Pyz\Zed\Acl\Component\Internal;

use ProjectA\Zed\Acl\Component\Internal\Install as CoreInstall;

/**
 * @property \Generated\Zed\Acl\Component\AclFactory $factory
 */
class Install extends CoreInstall
{

    const PAYONE_USERNAME = 'payone';

    public function install()
    {
        parent::install();
        $this->addPayoneResourceToGuestRole();
    }

    protected function addPayoneResourceToGuestRole()
    {
        $payoneGroup = $this->createDefaultGroup('Payment Transaction');
        $this->createDefaultResource('/payone\/transaction-status\/set\/*/', $payoneGroup);

        $guest = \ProjectA_Zed_Acl_Persistence_PacAclRoleQuery::create()->filterByName('Guest')->findOne();
        $this->createDefaultGroupPrivileges($guest, $payoneGroup);
    }
}