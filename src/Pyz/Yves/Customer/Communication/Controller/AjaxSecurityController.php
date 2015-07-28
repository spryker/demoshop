<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Communication\CustomerDependencyContainer;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Shared\Customer\Code\Messages;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class AjaxSecurityController extends AbstractController
{

    const LOGIN_EMAIL = 'email';
    const LOGIN_PASSWORD = 'password';

    const REGISTRATION_EMAIL = '_username';
    const REGISTRATION_PASSWORD = '_password';

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function loginAction(Request $request)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($request->request->get(self::LOGIN_EMAIL))
            ->setPassword($request->request->get(self::LOGIN_PASSWORD))
        ;
        $customerTransfer = $this->getLocator()->customer()->client()->login($customerTransfer);

        return $this->jsonResponse($customerTransfer);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function registerAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($request->request->get(self::REGISTRATION_EMAIL));
        $customerTransfer->setPassword($request->request->get(self::REGISTRATION_PASSWORD));

        $customerTransfer = $this->getLocator()->customer()->client()->registerCustomer($customerTransfer);
        if ($customerTransfer->getRegistrationKey()) {
            $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }
    }

}
