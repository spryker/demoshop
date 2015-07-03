<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Pyz\Yves\Customer\CustomerDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use SprykerFeature\Shared\Customer\Code\Messages;
use Pyz\Yves\Customer\Plugin\CustomerControllerProvider;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\CollectionValidator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

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

        if ($form->isValid()) {
            $customerTransfer = $this->getLocator()->customer()->transferCustomer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->getLocator()->customer()->client()->registerCustomer($customerTransfer);
            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }
        }

        return $this->jsonResponse();
    }
}
