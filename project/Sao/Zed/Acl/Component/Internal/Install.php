<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Acl_Component_Internal_Install extends ProjectA_Zed_Acl_Component_Internal_Install
{
    const ROLE_AP_API = 'ap_api';
    const ROLE_SBA_API = 'sba_api';
    const ROLE_JONDO_API = 'jondo_api';

    public function install()
    {
        parent::install();
        $this->addApUser($this->createApRole());
        $this->addSbaUser($this->createSbaRole());
        $this->addJondoUser($this->createJondoRole());
    }

    protected function createApRole()
    {
        $apiRole = $this->addOrCreateDefaultRole(self::ROLE_AP_API, false);

        $ressource = ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()
            ->filterByName('api_catalog')
            ->findOneOrCreate();
        $ressource->save();

        $privilege = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create()
            ->filterByName('post')
            ->filterByAclResource($ressource)
            ->findOneOrCreate();
        $privilege->save();

        ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create()
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create()
            ->filterByAclPrivilege($privilege)
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        $ressource = ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()
            ->filterByName('api_user')
            ->findOneOrCreate();
        $ressource->save();

        $privilege = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create()
            ->filterByName('get')
            ->filterByAclResource($ressource)
            ->findOneOrCreate();
        $privilege->save();

        ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create()
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create()
            ->filterByAclPrivilege($privilege)
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        return $apiRole;
    }

    protected function createSbaRole()
    {
        $apiRole = $this->addOrCreateDefaultRole(self::ROLE_SBA_API, false);

        $ressource = ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()
            ->filterByName('fulfillment_tracking')
            ->findOneOrCreate();
        $ressource->save();

        $privilege = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create()
            ->filterByName('sba')
            ->filterByAclResource($ressource)
            ->findOneOrCreate();
        $privilege->save();

        ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create()
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create()
            ->filterByAclPrivilege($privilege)
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        return $apiRole;
    }

    protected function createJondoRole()
    {
        $apiRole = $this->addOrCreateDefaultRole(self::ROLE_JONDO_API, false);

        $ressource = ProjectA_Zed_Acl_Persistence_PacAclResourceQuery::create()
            ->filterByName('fulfillment_tracking')
            ->findOneOrCreate();
        $ressource->save();

        $privilege = ProjectA_Zed_Acl_Persistence_PacAclPrivilegeQuery::create()
            ->filterByName('jondo')
            ->filterByAclResource($ressource)
            ->findOneOrCreate();
        $privilege->save();

        ProjectA_Zed_Acl_Persistence_PacAclRoleResourceQuery::create()
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        ProjectA_Zed_Acl_Persistence_PacAclRolePrivilegeQuery::create()
            ->filterByAclPrivilege($privilege)
            ->filterByAclResource($ressource)
            ->filterByAclRole($apiRole)
            ->findOneOrCreate()
            ->save();

        return $apiRole;
    }

    protected function addApUser(ProjectA_Zed_Acl_Persistence_PacAclRole $apiRole)
    {
        $query = new ProjectA_Zed_Acl_Persistence_PacAclUserQuery();
        $apUser = $query->filterByUsername('artistportal')->findOne();
        if (!$apUser) {
            $apUser = new ProjectA_Zed_Acl_Persistence_PacAclUser();
            $apUser->setFirstname('Artist')
                ->setLastname('Portal')
                ->setUsername('artistportal')
                ->setEmail('help@saatchionline.com')
                ->setIsDefault(true)
                ->setFkAclRole($apiRole->getPrimaryKey())
                ->setPassword($this->passwordManager->hash('MhwmmJOglQ4w5LuWJv7tCT!O'))
                ->save();
        }
    }

    protected function addSbaUser(ProjectA_Zed_Acl_Persistence_PacAclRole $apiRole)
    {
        $query = new ProjectA_Zed_Acl_Persistence_PacAclUserQuery();
        $sbaUser = $query->filterByUsername('sba')->findOne();
        if (!$sbaUser) {
            $sbaUser = new ProjectA_Zed_Acl_Persistence_PacAclUser();
            $sbaUser->setFirstname('Sba')
                ->setLastname('Fulfillment')
                ->setUsername('sba')
                ->setEmail('sbainfo@sbaglobal.com')
                ->setIsDefault(true)
                ->setFkAclRole($apiRole->getPrimaryKey())
                ->setPassword($this->passwordManager->hash('p2ylzocPZY3rH6Mvwk$K'))
                ->save();
        }
    }

    protected function addJondoUser(ProjectA_Zed_Acl_Persistence_PacAclRole $apiRole)
    {
        $query = new ProjectA_Zed_Acl_Persistence_PacAclUserQuery();
        $jondoUser = $query->filterByUsername('jondo')->findOne();
        if (!$jondoUser) {
            $jondoUser = new ProjectA_Zed_Acl_Persistence_PacAclUser();
            $jondoUser->setFirstname('Jondo')
                ->setLastname('Print')
                ->setUsername('jondo')
                ->setEmail('info@jondo.com')
                ->setIsDefault(true)
                ->setFkAclRole($apiRole->getPrimaryKey())
                ->setPassword($this->passwordManager->hash('d1xy!NgRn3PAKNyLGcmy'))
                ->save();
        }
    }

}
