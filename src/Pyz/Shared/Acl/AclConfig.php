<?php

namespace Pyz\Shared\Acl;
use SprykerFeature\Shared\Acl\AclConfig as SprykerAclConfig;

interface AclConfig extends SprykerAclConfig
{

    const ACL_DEFAULT_USER = 'ACL_DEFAULT_USER';
    const ROOT_GROUP = 'root_group';

}
