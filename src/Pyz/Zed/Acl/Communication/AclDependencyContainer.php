<?php

namespace Pyz\Zed\Acl\Communication;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator;
use Pyz\Zed\Acl\Communication\Grid\UsersWithGroups;

class AclDependencyContainer extends \SprykerFeature\Zed\Acl\Communication\AclDependencyContainer
{
    public function createUsersWithGroupGrid(Request $request)
    {
        $aclQueryContainer = $this->createAclQueryContainer();
        $query = $aclQueryContainer->queryUsersWithGroup();
        return $this->factory->createGridUsersWithGroupGrid(
            $query,
            $request,
            $this->locator
        );
    }
}
