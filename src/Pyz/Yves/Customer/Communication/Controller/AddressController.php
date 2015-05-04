<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Pyz\Yves\Customer\CustomerDependencyContainer;
use SprykerFeature\Shared\Customer\Code\Messages;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Pyz\Yves\Customer\Plugin\CustomerControllerProvider;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class AddressController extends AbstractController
{
    /**
     * @param Request $request
     *
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

        $form = $this->createForm($this->getDependencyContainer()->createFormAddress());

        if ($form->isValid()) {
            $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer->setIdCustomerAddress($addressId);
            $addressTransfer = $this->getLocator()->customer()->sdk()->updateAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_UPDATED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
        }

        $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
        $addressTransfer->setEmail($this->getUsername());
        $addressTransfer->setIdCustomerAddress($addressId);
        $addressTransfer = $this->getLocator()->customer()->sdk()->getAddress($addressTransfer);
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
        $form = $this->createForm($this->getDependencyContainer()->createFormAddress());

        if ($form->isValid()) {
            $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->getLocator()->customer()->sdk()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEW_ADDRESS);
        }

        $customerTransfer = new \Generated\Shared\Transfer\CustomerCustomerTransfer();
        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->getLocator()->customer()->sdk()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getLocator()->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
            $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getLocator()->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }
}
