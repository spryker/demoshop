<?php
namespace Pyz\Yves\Customer\Module\Controller;

use ProjectA\Yves\Customer\Module\Controller\SecurityController as CoreSecurityController;
use Pyz\Yves\Application\Module\ControllerProvider;

class SecurityController extends CoreSecurityController
{
    /**
     * @return string
     */
    protected function getHomepageUrl()
    {
        return ControllerProvider::ROUTE_HOME;
    }
}
