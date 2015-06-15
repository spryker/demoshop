<?php

namespace Pyz\Zed\User\Business;

use SprykerFeature\Zed\Acl\Dependency\Facade\AclToUserInterface;
use SprykerFeature\Zed\User\Business\UserFacade as SprykerUserFacade;

class UserFacade extends SprykerUserFacade implements
    AclToUserInterface
{

}
