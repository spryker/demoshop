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
        $this->addPayoneUserWithRole($this->createPayoneNotificationRole());
    }


    protected function createPayoneNotificationRole()
    {
        $payoneNotificationRole = $this->addOrCreateDefaultRole('guest', false);

        $transactionStatusResource = (new \ProjectA_Zed_Acl_Persistence_PacAclResourceQuery())
            ->filterByName('payone_transaction-status-controller')
            ->findOneOrCreate();
        $transactionStatusResource->save();

        $setPrivilege = (new \ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery())
            ->filterByName('process')
            ->filterByAclResource($transactionStatusResource)
            ->findOneOrCreate();
        $setPrivilege->save();

        (new \ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery())
            ->filterByAclPrivilege($setPrivilege)
            ->filterByAclResource($transactionStatusResource)
            ->filterByAclRole($payoneNotificationRole)
            ->findOneOrCreate()
            ->save();

        return $payoneNotificationRole;
    }

    protected function addPayoneUserWithRole(\ProjectA_Zed_Acl_Persistence_PacAclRole $role)
    {
        $payoneUser = (new \ProjectA_Zed_Acl_Persistence_PacAclUserQuery())
            ->filterByUsername(self::PAYONE_USERNAME)->findOne();
        if (!$payoneUser) {
            \Generated_Zed_EntityLoader::loadPacAclUser()
                ->setFirstname('Payone')
                ->setLastname('GmbH')
                ->setUsername(self::PAYONE_USERNAME)
                ->setEmail('')
                ->setIsDefault(true)
                ->setFkAclRole($role->getPrimaryKey())
                ->setPassword($this->passwordManager->hash('6tAChEp=ufr5D+#!e5eB'))
                ->save();
        }
    }

}