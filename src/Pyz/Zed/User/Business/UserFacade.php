<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\User\Business;

use Spryker\Zed\Acl\Dependency\Facade\AclToUserInterface;
use Spryker\Zed\User\Business\UserFacade as SprykerUserFacade;

class UserFacade extends SprykerUserFacade implements AclToUserInterface
{
}
