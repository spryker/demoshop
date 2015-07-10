<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerAddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Communication\CustomerDependencyContainer;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use SprykerFeature\Shared\Customer\Code\Messages;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class AddressController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @throws NotFoundHttpException
     *
     * @return array|RedirectResponse
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
            $addressTransfer = new CustomerAddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer->setIdCustomerAddress($addressId);
            $addressTransfer = $this->getLocator()->customer()->client()->updateAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_UPDATED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
        }

        $addressTransfer = new CustomerAddressTransfer();
        $addressTransfer->setEmail($this->getUsername());
        $addressTransfer->setIdCustomerAddress($addressId);
        $addressTransfer = $this->getLocator()->customer()->client()->getAddress($addressTransfer);
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
            $addressTransfer = new CustomerAddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->getLocator()->customer()->client()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEW_ADDRESS);
        }

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->getLocator()->customer()->client()->getCustomer($customerTransfer);
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
            $addressTransfer = new CustomerAddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getLocator()->customer()->client()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
            $addressTransfer = new CustomerAddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getLocator()->customer()->client()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addMessageError(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

}
