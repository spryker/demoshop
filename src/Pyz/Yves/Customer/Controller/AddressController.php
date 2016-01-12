<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
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
     * @return array|RedirectResponse
     */
    public function indexAction()
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressesTransfer = $this
            ->getClient()
            ->getAddresses($customerTransfer);

        $responseData = $this->getAddressListResponseData($addressesTransfer, $customerTransfer);

        return $this->viewResponse($responseData);
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function createAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $addressFormType = $this
            ->getFactory()
            ->createFormAddress();

        $addressForm = $this
            ->buildForm($addressFormType)
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
     * @param Request $request
     *
     * @throws NotFoundHttpException
     *
     * @return array|RedirectResponse
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
            ->createFormAddress($addressTransfer);

        $addressForm = $this
            ->buildForm($addressFormType);

        return $this->viewResponse([
            'form' => $addressForm->createView(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
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
     * @param Request $request
     *
     * @return RedirectResponse
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
     * @param AddressesTransfer $addressesTransfer
     * @param CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getAddressListResponseData(AddressesTransfer $addressesTransfer, CustomerTransfer $customerTransfer)
    {
        $responseData = [
            self::KEY_DEFAULT_BILLING_ADDRESS => null,
            self::KEY_DEFAULT_SHIPPING_ADDRESS => null,
            self::KEY_ADDRESSES => null,
        ];

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
     * @param CustomerTransfer $customerTransfer
     * @param AddressTransfer $addressTransfer
     *
     * @return CustomerTransfer
     */
    protected function createAddress(CustomerTransfer $customerTransfer, AddressTransfer $addressTransfer)
    {
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
     * @return AddressTransfer|null
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
     * @param AddressTransfer $addressTransfer
     *
     * @return CustomerTransfer
     */
    protected function processAddressUpdate(AddressTransfer $addressTransfer)
    {
        $customerTransfer = $this
            ->getClient()
            ->updateAddressAndCustomerDefaultAddresses($addressTransfer);

        return $customerTransfer;
    }

    /**
     * @param AddressTransfer $addressTransfer
     * @param int $idCustomerAddress
     *
     * @return bool
     */
    protected function isDefaultAddress(AddressTransfer $addressTransfer, $idCustomerAddress)
    {
        return ((int) $addressTransfer->getIdCustomerAddress() === (int) $idCustomerAddress);
    }

}
