<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Pyz\Yves\Customer\CustomerDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use SprykerFeature\Shared\Customer\Code\Messages;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class AjaxSecurityController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function loginAction(Request $request)
    {
    }

    /**
     * @return JsonResponse
     */
    public function registerAction(Request $request)
    {
    }
}
