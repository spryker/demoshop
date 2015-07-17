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
            $this->addMessageSuccess(Messages::CUSTOMER_PASSWORD_RECOVERY_MAIL_SENT);

            return $this->redirectResponseInternal('home');
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
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setUsername($this->getUsername());
            $customerTransfer->setRestorePasswordKey($request->query->get('token'));
            $this->getLocator()->customer()->client()->restorePassword($customerTransfer);
            $this->getLocator()->customer()->client()->logout($customerTransfer);

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
            $customerTransfer->setUsername($this->getUsername());
            $customerTransfer->setEmail($this->getUsername());
            if ($this->getLocator()->customer()->client()->deleteCustomer($customerTransfer)) {
                $this->getLocator()->customer()->client()->logout($customerTransfer);

                return $this->redirectResponseInternal('home');
            } else {
                $this->addMessageError(Messages::CUSTOMER_DELETE_FAILED);
            }
        }

        return ['form' => $form->createView()];
    }

    /**
     * @return array|RedirectResponse
     */
    public function profileAction()
    {
        $customerTransfer = new \Generated\Shared\Transfer\CustomerTransfer();

        $form = $this->createForm($this->getDependencyContainer()->createFormProfile());

        if ($form->isValid()) {
            $customerTransfer->fromArray($form->getData());
            $customerTransfer->setEmail($this->getUsername());
            $this->getLocator()->customer()->client()->updateCustomer($customerTransfer);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->getLocator()->customer()->client()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return [
            'form' => $form->createView(),
            'addresses' => $customerTransfer->getAddresses(),
        ];
    }

}
