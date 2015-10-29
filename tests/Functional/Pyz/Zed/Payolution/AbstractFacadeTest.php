<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\Payolution\Persistence\Map\SpyPaymentPayolutionTableMap;
use Orm\Zed\Payolution\Persistence\SpyPaymentPayolution;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Generated\Shared\Transfer\ItemTransfer;


abstract class AbstractFacadeTest extends AbstractFunctionalTest
{

    const FIRST_NAME = 'Alice';
    const LAST_NAME = 'Spryker';
    const BIRTH_DATE = '1980-01-01';
    const EMAIL = 'alice@mailprovider.com';
    const STREET = 'Julie-Wolfthorn-Straße 1';
    const ZIP_CODE = '10115';
    const CITY = 'Berlin';
    const SALUTATION = 'Mr';
    const COUNTRY_CODE = 'de';
    const CURRENCY_CODE = 'EUR';
    const REFERENCE = 'payolution-test';
    const CLIENT_IP = '127.0.0.1';
    const TOTAL = 599;
    const PAYMENT_METHOD = 'invoice';
    const SKU = '1234567890';
    const ITEM_QUANTITY = 1;
    const ITEM_NAME = 'socks';

    /**
     * @var SpySalesOrder
     */
    private $orderEntity;

    /**
     * @var SpyPaymentPayolution
     */
    private $paymentEntity;

    /**
     * @var OrderTransfer
     */
    private $orderTransfer;

    /**
     * @var CheckoutRequestTransfer
     */
    private $checkoutRequestTransfer;

    /**
     * @var CustomerTransfer
     */
    private $customerTransfer;

    /**
     * @var AddressTransfer
     */
    private $addressTransfer;

    /**
     * @var PayolutionPaymentTransfer
     */
    private $payolutionPaymentTransfer;

    /**
     * @var TotalsTransfer
     */
    private $totalsTransfer;

    /**
     * @var ItemTransfer
     */
    private $itemTransfer;

    /**
     * @var CartTransfer
     */
    private $cartTransfer;

    protected function _before()
    {
        parent::_before();

        $this->setCustomerTransferTestData();
        $this->setAddressTransferTestData();
        $this->setTotalsTransferTestData();
        $this->setPayolutionPaymentTransferTestData();
        $this->setItemTransferTestData();
        $this->setCartTransferTestData();
        $this->setOrderEntityTestData();
        $this->setPaymentTestData();
        $this->setOrderTransferTestData();
        $this->setCheckoutRequestTransfer();
    }

    protected function setOrderEntityTestData()
    {
        $country = SpyCountryQuery::create()->findOneByIso2Code('de');

        $billingAddress = (new SpySalesOrderAddress())
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setAddress1(self::STREET)
            ->setZipCode(self::ZIP_CODE)
            ->setCity(self::CITY)
            ->setFkCountry($country->getIdCountry());
        $billingAddress->save();

        $customer = (new SpyCustomer())
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setDateOfBirth(self::BIRTH_DATE)
            ->setGender(SpyCustomerTableMap::COL_GENDER_FEMALE)
            ->setEmail(self::EMAIL)
            ->setCustomerReference(self::REFERENCE);
        $customer->save();

        $this->orderEntity = (new SpySalesOrder())
            ->setIsTest(true)
            ->setCustomer($customer)
            ->setGrandTotal(self::TOTAL)
            ->setSubtotal(self::TOTAL)
            ->setFkSalesOrderAddressShipping($billingAddress->getIdSalesOrderAddress())
            ->setFkSalesOrderAddressBilling($billingAddress->getIdSalesOrderAddress())
            ->setOrderReference('foo-bar');
        $this->orderEntity->save();
    }

    /**
     * @return SpySalesOrder
     */
    protected function getOrderEntity()
    {
        return $this->orderEntity;
    }

    protected function setPaymentTestData()
    {
        $this->paymentEntity = (new SpyPaymentPayolution())
            ->setFkSalesOrder($this->getOrderEntity()->getIdSalesOrder())
            ->setAccountBrand(PayolutionApiConstants::BRAND_INVOICE)
            ->setClientIp(self::CLIENT_IP)
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setDateOfBirth(self::BIRTH_DATE)
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE)
            ->setSalutation(SpyPaymentPayolutionTableMap::COL_SALUTATION_MRS)
            ->setEmail(self::EMAIL)
            ->setStreet(self::STREET)
            ->setZipCode(self::ZIP_CODE)
            ->setCity(self::CITY)
            ->setCountryIso2Code(self::COUNTRY_CODE)
            ->setLanguageIso2Code(self::COUNTRY_CODE)
            ->setCurrencyIso3Code(self::CURRENCY_CODE);

        $this->paymentEntity->save();
    }

    /**
     * @return SpyPaymentPayolution
     */
    protected function getPaymentEntity()
    {
        return $this->paymentEntity;
    }

    protected function setOrderTransferTestData()
    {
        $this->orderTransfer = (new OrderTransfer())
            ->setIsTest(true)
            ->setCustomer($this->customerTransfer)
            ->setPayolutionPayment($this->payolutionPaymentTransfer)
            ->setIdSalesOrder($this->getOrderEntity()->getIdSalesOrder())
            ->setTotals($this->totalsTransfer)
            ->setShippingAddress($this->addressTransfer)
            ->setBillingAddress($this->addressTransfer)
            ->setOrderReference(self::REFERENCE);
    }

    /**
     * @return OrderTransfer
     */
    protected function getOrderTransfer()
    {
        return $this->orderTransfer;
    }

    protected function setCheckoutRequestTransfer()
    {
        $this->checkoutRequestTransfer = (new CheckoutRequestTransfer())
            ->setIdUser(null)
            ->setShippingAddress($this->addressTransfer)
            ->setBillingAddress($this->addressTransfer)
            ->setPaymentMethod(self::PAYMENT_METHOD)
            ->setCart($this->cartTransfer)
            ->setPayolutionPayment($this->payolutionPaymentTransfer);
    }

    /**
     * @return CheckoutRequestTransfer
     */
    protected function getCheckoutRequestTransfer()
    {
        return $this->checkoutRequestTransfer;
    }

    protected function setCustomerTransferTestData()
    {
        $this->customerTransfer = (new CustomerTransfer())
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setDateOfBirth(self::BIRTH_DATE)
            ->setGender(SpyCustomerTableMap::COL_GENDER_FEMALE)
            ->setEmail(self::EMAIL)
            ->setCustomerReference(self::REFERENCE);
    }

    protected function setAddressTransferTestData()
    {
        $country = SpyCountryQuery::create()->findOneByIso2Code(self::COUNTRY_CODE);

        $this->addressTransfer = (new AddressTransfer())
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setAddress1(self::STREET)
            ->setSalutation(self::SALUTATION)
            ->setEmail(self::EMAIL)
            ->setIso2Code(self::COUNTRY_CODE)
            ->setZipCode(self::ZIP_CODE)
            ->setCity(self::CITY)
            ->setFkCountry($country->getIdCountry());
    }

    protected function setTotalsTransferTestData()
    {
        $this->totalsTransfer = (new TotalsTransfer())
            ->setGrandTotal(self::TOTAL)
            ->setGrandTotalWithDiscounts(self::TOTAL)
            ->setSubtotal(self::TOTAL);
    }

    protected function setPayolutionPaymentTransferTestData()
    {
        $this->payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAccountBrand(PayolutionApiConstants::BRAND_INVOICE)
            ->setClientIp(self::CLIENT_IP)
            ->setLanguageIso2Code(self::COUNTRY_CODE)
            ->setCurrencyIso3Code(self::CURRENCY_CODE)
            ->setAddress($this->addressTransfer)
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE)
        ;
    }

    protected function setItemTransferTestData()
    {
        $this->itemTransfer = (new ItemTransfer())
            ->setSku(self::SKU)
            ->setQuantity(self::ITEM_QUANTITY)
            ->setPriceToPay(self::TOTAL)
            ->setGrossPrice(self::TOTAL)
            ->setName(self::ITEM_NAME)
            ->setTaxSet(new TaxSetTransfer());
    }

    protected function setCartTransferTestData()
    {
        $this->cartTransfer = (new CartTransfer())
            ->addItem($this->itemTransfer)
            ->setTotals($this->totalsTransfer);
    }

}
