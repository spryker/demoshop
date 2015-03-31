<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use ProjectA\Shared\Customer\Transfer\Address as AddressTransfer;
use ProjectA\Shared\Customer\Transfer\Customer as CustomerTransfer;

class AddressController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     * @throws NotFoundHttpException
     */
    public function addressAction(Request $request)
    {
        $addressId = $request->query->get("id");
        if (!$addressId) {
            throw new NotFoundHttpException("Unknown address.");
        }

        $form = $this->createForm($this->dependencyContainer->createFormAddress());

        if ($form->isValid()) {
            /** @var AddressTransfer $addressTransfer */
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer->setIdCustomerAddress($addressId);
            $addressTransfer = $this->locator->customer()->sdk()->updateAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess("customer.address.updated");

                return $this->redirectResponseInternal("profile");
            }
            $this->addMessageError("customer.address.not.added");

            return $this->redirectResponseInternal("address");
        }

        /** @var AddressTransfer $customerTransfer */
        $addressTransfer = $this->locator->customer()->transferAddress();
        $addressTransfer->setEmail($this->getUsername());
        $addressTransfer->setIdCustomerAddress($addressId);
        $addressTransfer = $this->locator->customer()->sdk()->getAddress($addressTransfer);
        if (!$addressTransfer) {
            throw new NotFoundHttpException("Unknown address.");
        }
        $form->setData($addressTransfer->toArray());

        return ["form" => $form->createView()];
    }

    /**
     * @return array|RedirectResponse
     */
    public function newAction()
    {
        $form = $this->createForm($this->dependencyContainer->createFormAddress());

        if ($form->isValid()) {
            /** @var AddressTransfer $addressTransfer */
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->locator->customer()->sdk()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess("customer.address.added");

                return $this->redirectResponseInternal("profile");
            }
            $this->addMessageError("customer.address.not.added");

            return $this->redirectResponseInternal("new-address");
        }

        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();
        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->locator->customer()->sdk()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return ["form" => $form->createView()];
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        if ($request->isMethod("POST")) {
            /** @var AddressTransfer $addressTransfer */
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->setIdCustomerAddress($request->query->get("id"));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->locator->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess("customer.address.delete.success");
            } else {
                $this->addMessageError("customer.address.delete.failed");
            }
            /** @var AddressTransfer $addressTransfer */
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->setIdCustomerAddress($request->query->get("id"));
            $addressTransfer->setEmail($this->getUsername());
            $deletion = $this->locator->customer()->sdk()->deleteAddress($addressTransfer);
            if ($deletion->isSuccess()) {
                $this->addMessageSuccess("customer.address.delete.success");
            } else {
                $this->addMessageError("customer.address.delete.failed");
            }
        }

        return $this->redirectResponseInternal("profile");
    }
}