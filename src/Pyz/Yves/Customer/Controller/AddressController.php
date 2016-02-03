<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\AddressForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Shared\Customer\Code\Messages;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddressController extends AbstractCustomerController
{

    const KEY_DEFAULT_BILLING_ADDRESS = 'default_billing_address';
    const KEY_DEFAULT_SHIPPING_ADDRESS = 'default_shipping_address';
    const KEY_ADDRESSES = 'addresses';

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressesTransfer = $this
            ->getClient()
            ->getAddresses($customerTransfer);

        $responseData = $this->getAddressListResponseData($customerTransfer, $addressesTransfer);

        return $this->viewResponse($responseData);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressFormType = $this
            ->getFactory()
            ->createFormAddress();

        $addressForm = $this
            ->buildForm($addressFormType)
            ->setData($this->getDefaultFormData($customerTransfer))
            ->handleRequest($request);

        if ($addressForm->isValid()) {
            $customerTransfer = $this->createAddress($customerTransfer, $addressForm->getData());

            if ($customerTransfer) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
            }

            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_NOT_ADDED);
        }

        return $this->viewResponse([
            'form' => $addressForm->createView(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction(Request $request)
    {
        $addressTransfer = $this->loadAddressTransfer($request->query->getInt('id'));

        if ($addressTransfer === null) {
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_UNKNOWN);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
        }

        $addressFormType = $this
            ->getFactory()
            ->createFormAddress();

        $addressForm = $this
            ->buildForm($addressFormType)
            ->setData($addressTransfer->toArray());

        return $this->viewResponse([
            'form' => $addressForm->createView(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function submitUpdateAction(Request $request)
    {
        $addressFormType = $this
            ->getFactory()
            ->createFormAddress();

        $addressForm = $this
            ->buildForm($addressFormType)
            ->handleRequest($request);

        if ($addressForm->isValid()) {
            $customerTransfer = $this->processAddressUpdate($addressForm->getData());

            if ($customerTransfer !== null) {
                $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_UPDATED);
            } else {
                $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_NOT_ADDED);
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressTransfer = new AddressTransfer();
        $addressTransfer
            ->setIdCustomerAddress($request->query->getInt('id'))
            ->setFkCustomer($customerTransfer->getIdCustomer());

        $addressTransfer = $this
            ->getClient()
            ->deleteAddress($addressTransfer);

        if ($addressTransfer !== null) {
            $this->addSuccessMessage(Messages::CUSTOMER_ADDRESS_DELETE_SUCCESS);
        } else {
            $this->addErrorMessage(Messages::CUSTOMER_ADDRESS_DELETE_FAILED);
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADDRESS);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\AddressTransfer
     */
    protected function getDefaultFormData(CustomerTransfer $customerTransfer)
    {
        return [
            AddressForm::FIELD_FIRST_NAME => $customerTransfer->getFirstName(),
            AddressForm::FIELD_LAST_NAME => $customerTransfer->getLastName(),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Generated\Shared\Transfer\AddressesTransfer|null $addressesTransfer
     *
     * @return array
     */
    protected function getAddressListResponseData(CustomerTransfer $customerTransfer, AddressesTransfer $addressesTransfer = null)
    {
        $responseData = [
            self::KEY_DEFAULT_BILLING_ADDRESS => null,
            self::KEY_DEFAULT_SHIPPING_ADDRESS => null,
            self::KEY_ADDRESSES => null,
        ];

        if ($addressesTransfer === null) {
            return $responseData;
        }

        foreach ($addressesTransfer->getAddresses() as $addressTransfer) {
            $other = true;
            if ((int) $addressTransfer->getIdCustomerAddress() === (int) $customerTransfer->getDefaultBillingAddress()) {
                $responseData[self::KEY_DEFAULT_BILLING_ADDRESS] = $addressTransfer;
                $other = false;
            }

            if ((int) $addressTransfer->getIdCustomerAddress() === (int) $customerTransfer->getDefaultShippingAddress()) {
                $responseData[self::KEY_DEFAULT_SHIPPING_ADDRESS] = $addressTransfer;
                $other = false;
            }

            if ($other) {
                $responseData[self::KEY_ADDRESSES][] = $addressTransfer;
            }
        }

        return $responseData;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param array $addressData
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function createAddress(CustomerTransfer $customerTransfer, array $addressData)
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->fromArray($addressData);
        $addressTransfer
            ->setFkCustomer($customerTransfer->getIdCustomer());

        $customerTransfer = $this
            ->getClient()
            ->createAddressAndUpdateCustomerDefaultAddresses($addressTransfer);

        return $customerTransfer;
    }

    /**
     * @param int $idCustomerAddress
     *
     * @return \Generated\Shared\Transfer\AddressTransfer|null
     */
    protected function loadAddressTransfer($idCustomerAddress)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressTransfer = new AddressTransfer();
        $addressTransfer
            ->setIdCustomerAddress($idCustomerAddress)
            ->setFkCustomer($customerTransfer->getIdCustomer());

        $addressTransfer = $this
            ->getClient()
            ->getAddress($addressTransfer);

        return $addressTransfer;
    }

    /**
     * @param array $addressData
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function processAddressUpdate(array $addressData)
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->fromArray($addressData);

        $customerTransfer = $this
            ->getClient()
            ->updateAddressAndCustomerDefaultAddresses($addressTransfer);

        return $customerTransfer;
    }

}
