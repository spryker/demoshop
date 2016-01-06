<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractCustomerController
{

    const MESSAGE_PROFILE_CHANGE_SUCCESS = 'customer.profile.change.success';
    const MESSAGE_PASSWORD_CHANGE_SUCCESS = 'customer.password.change.success';

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $profileForm = $this
            ->buildForm($this->getFactory()->createFormProfile())
            ->handleRequest($request);

        if ($profileForm->isValid()) {
            return $this->processProfileUpdate($profileForm, $customerTransfer);
        }

        $profileForm->setData($customerTransfer->toArray());

        // TODO: create Password form
        // TODO: separate password form handling into another action?
//        $passwordForm = $this
//            ->buildForm($this->getFactory()->createFormPassword())
//            ->handleRequest($request);
//
//        if ($passwordForm->isValid()) {
//            return $this->processPasswordUpdate($passwordForm, $customerTransfer);
//        }

        return [
            'profileForm' => $profileForm->createView(),
//            'passwordForm' => $passwordForm->createView(),
        ];
    }

    /**
     * @param FormInterface $profileForm
     * @param CustomerTransfer $customerTransfer
     *
     * @return RedirectResponse
     */
    protected function processProfileUpdate(FormInterface $profileForm, CustomerTransfer $customerTransfer)
    {
        $updatedCustomerTransfer = clone $customerTransfer;
        $updatedCustomerTransfer->fromArray($profileForm->getData());

        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomer($updatedCustomerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->addSuccessMessage(self::MESSAGE_PROFILE_CHANGE_SUCCESS);
            $customerTransfer->fromArray($customerResponseTransfer->getCustomerTransfer()->toArray());
        } else {
            foreach ($customerResponseTransfer->getErrors() as $customerErrorTransfer) {
                $this->addErrorMessage($customerErrorTransfer->getMessage());
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

    /**
     * @param FormInterface $passwordForm
     * @param CustomerTransfer $customerTransfer
     *
     * @return RedirectResponse
     */
    protected function processPasswordUpdate(FormInterface $passwordForm, CustomerTransfer $customerTransfer)
    {
        $customerTransfer->fromArray($passwordForm->getData());

        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomerPassword($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->addSuccessMessage(self::MESSAGE_PASSWORD_CHANGE_SUCCESS);
        }

        foreach ($customerResponseTransfer->getErrors() as $customerErrorTransfer) {
            $this->addErrorMessage($customerErrorTransfer->getMessage());
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

}
