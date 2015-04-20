<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use ProjectA\Shared\Customer\Code\Messages;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;

class AddressController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     * @throws NotFoundHttpException
     */
    public function updateAction(Request $request)
    {
        $addressId = $request->query->get('id');
        if (!$addressId) {
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_UNKNOWN);
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        $form = $this->createForm($this->dependencyContainer->createFormAddress());

        if ($form->isValid()) {
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer->setIdCustomerAddress($addressId);
            $addressTransfer = $this->locator->customer()->sdk()->updateAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_UPDATED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
        }

        $addressTransfer = $this->locator->customer()->transferAddress();
        $addressTransfer->setEmail($this->getUsername());
        $addressTransfer->setIdCustomerAddress($addressId);
        $addressTransfer = $this->locator->customer()->sdk()->getAddress($addressTransfer);
        if (!$addressTransfer) {
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_UNKNOWN);
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }
        $form->setData($addressTransfer->toArray());

        return ['form' => $form->createView()];
    }

    /**
     * @return array|RedirectResponse
     */
    public function createAction()
    {
        $form = $this->createForm($this->dependencyContainer->createFormAddress());

        if ($form->isValid()) {
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->locator->customer()->sdk()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEW_ADDRESS);
        }

        $customerTransfer = $this->locator->customer()->transferCustomer();
        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->locator->customer()->sdk()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->locator->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->locator->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }
}
