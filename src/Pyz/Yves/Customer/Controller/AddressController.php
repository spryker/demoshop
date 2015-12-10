<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\AddressTransfer;
use Pyz\Yves\Customer\CustomerDependencyContainer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use SprykerFeature\Client\Customer\Service\CustomerClientInterface;
use SprykerFeature\Shared\Customer\Code\Messages;
use SprykerEngine\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 * @method CustomerClientInterface getClient()
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
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_UNKNOWN);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        $form = $this->createForm($this->getDependencyContainer()->createFormAddress());

        if ($form->isValid()) {
            $addressTransfer = new AddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer->setIdCustomerAddress($addressId);
            $addressTransfer = $this->getClient()->updateAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_UPDATED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
        }

        $addressTransfer = new AddressTransfer();
        $addressTransfer->setEmail($this->getUsername());
        $addressTransfer->setIdCustomerAddress($addressId);
        $addressTransfer = $this->getClient()->getAddress($addressTransfer);
        if (!$addressTransfer) {
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_UNKNOWN);

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
            $addressTransfer = new AddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->getClient()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEW_ADDRESS);
        }

        $customerTransfer = $this->getClient()->getCustomer();
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
            $addressTransfer = new AddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getClient()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
            $addressTransfer = new AddressTransfer();
            $addressTransfer->setIdCustomerAddress($request->query->get('id'));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->getClient()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
            } else {
                $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

}
