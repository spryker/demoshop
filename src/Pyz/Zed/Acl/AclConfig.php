<?php

namespace Pyz\Zed\Acl;
use Pyz\Shared\Acl\AclConfig as AclSharedConfig;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Zed\Acl\AclConfig as SprykerAclConfig;

class AclConfig extends SprykerAclConfig
{

    /**
     * @return array|mixed
     * @throws \Exception
     */
    public function getInstallerUsers()
    {
        if (Config::hasValue(AclSharedConfig::ACL_DEFAULT_USER)) {
            return Config::get(AclSharedConfig::ACL_DEFAULT_USER);
        }

        return [];
    }

}
