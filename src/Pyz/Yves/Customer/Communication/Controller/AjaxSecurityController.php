<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\CustomerDependencyContainer;
use Pyz\Yves\Customer\Plugin\CustomerControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Collection;

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
        $form = $this->createForm($this->getDependencyContainer()->createFormRegister());
        $customerTransfer = $this->getLocator()->customer()->transferCustomer();
        if ($form->isValid()) {
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->getLocator()->customer()->client()->registerCustomer($customerTransfer);
            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }
        }

        return $this->jsonResponse($customerTransfer);
    }
}
