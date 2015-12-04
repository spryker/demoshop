<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Communication\CustomerDependencyContainer;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use SprykerFeature\Shared\Customer\Code\Messages;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class CustomerController extends AbstractController
{

    /**
     * @return array|RedirectResponse
     */
    public function forgotPasswordAction()
    {
        $form = $this->createForm($this->getDependencyContainer()->createFormForgot());

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());
            $this->getLocator()->customer()->client()->forgotPassword($customerTransfer);
            $this->addSuccessMessage(Messages::CUSTOMER_PASSWORD_RECOVERY_MAIL_SENT);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function restorePasswordAction(Request $request)
    {
        $form = $this->createForm($this->getDependencyContainer()->createFormRestore());

        if ($form->isValid()) {
            $formData = $form->getData();
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setRestorePasswordKey($request->query->get('token'));
            $customerTransfer->setPassword($formData['password']);
            $this->getLocator()->customer()->client()->restorePassword($customerTransfer);
            $this->getLocator()->customer()->client()->logout();

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function createPasswordAction(Request $request)
    {
        $form = $this->createForm(
            $this->getDependencyContainer()->createFormCreatePassword()
        );

        if ($form->isValid()) {
            $formData = $form->getData();
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setRestorePasswordKey($formData['restore_key']);
            $customerTransfer->setPassword($formData['password']);
            $this->getLocator()->customer()->client()->restorePassword($customerTransfer);
            $this->getLocator()->customer()->client()->logout();

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        $form = $this->createForm($this->getDependencyContainer()->createFormDelete());

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setEmail($this->getUsername());
            if ($this->getLocator()->customer()->client()->deleteCustomer($customerTransfer)) {
                $this->getLocator()->customer()->client()->logout();

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
            } else {
                $this->addErrorMessage(Messages::CUSTOMER_DELETE_FAILED);
            }
        }

        return ['form' => $form->createView()];
    }

    /**
     * @return array|RedirectResponse
     */
    public function profileAction()
    {
        $customerTransfer = $this->getDependencyContainer()->createCustomerClient()->getCustomer();
        $form = $this->createForm($this->getDependencyContainer()->createFormProfile(), $customerTransfer);

        if ($form->isValid()) {
            $customerTransfer = $form->getData();
            $customerTransfer->setEmail($this->getUsername());

            $this->getLocator()->customer()->client()->updateCustomer($customerTransfer);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        return [
            'form' => $form->createView(),
            'addresses' => $customerTransfer->getAddresses(),
        ];
    }

}
