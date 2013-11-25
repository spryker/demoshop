<?php

namespace Pyz\Yves\Customer\Module\Controller;
use ProjectA\Yves\Customer\Module\Controller\SecurityController as ProjectASecurityController;
use Pyz\Yves\Application\Module\ControllerProvider;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends ProjectASecurityController
{

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function loginOrRegisterAction(Request $request)
    {
        return parent::loginOrRegisterAction($request);
    }

    /**
     * @return string
     */
    protected function getHomepageUrl()
    {
        return ControllerProvider::ROUTE_HOME;
    }
}