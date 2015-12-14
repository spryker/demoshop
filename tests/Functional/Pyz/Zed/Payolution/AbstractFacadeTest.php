<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

use Codeception\TestCase\Test;
use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\Payolution\Persistence\Map\SpyPaymentPayolutionTableMap;
use Orm\Zed\Payolution\Persistence\SpyPaymentPayolution;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use Spryker\Shared\Payolution\PayolutionConstants;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Generated\Shared\Transfer\ItemTransfer;

abstract class AbstractFacadeTest extends Test
{

    const FIRST_NAME = 'Alice';
    const LAST_NAME = 'Bob';
    const SALUTATION = 'Mrs';
    const BIRTH_DATE = '1980-01-01';

    const EMAIL = 'alice@mailprovider.com';
    const CLIENT_IP = '127.0.0.1';

    const STREET = 'Julie-Wolfthorn-Straße 1';
    const ZIP_CODE = '10115';
    const CITY = 'Berlin';
    const COUNTRY_CODE = 'de';

    const BIC = 'DABAIE2';
    const IBAN = 'DE89370400440532013000';

    const ITEM_QUANTITY = 1;
    const ITEM_NAME = 'socks';
    const REFERENCE = 'payolution-test';
    const SKU = '1234567890';

    const CURRENCY_CODE = 'EUR';
    const TOTAL = 599;
    const INSTALLMENT_AMOUNT = 204.10;
    const INSTALLMENT_DURATION = 3;

    /**
     * @var OrderTransfer
     */
    private $orderTransfer;

    /**
     * @var SpyPaymentPayolution
     */
    private $paymentEntity;

    /**
     * @var CheckoutRequestTransfer
     */
    private $checkoutRequestTransfer;

    /**
     * @var SpySalesOrder
     */
    private $orderEntity;

    /**
     * @var PayolutionPaymentTransfer
     */
    private $payolutionPaymentTransfer;

    /**
     * @var CustomerTransfer
     */
    private $customerTransfer;

    /**
     * @var AddressTransfer
     */
    private $addressTransfer;

    /**
     * @var TotalsTransfer
     */
    private $totalsTransfer;

    /**
     * @var ItemTransfer
     */
    private $itemTransfer;

    /**
     * @var QuoteTransfer
     */
    private $cartTransfer;

    /**
     * @var string
     */
    private $accountBrand;

    /**
     * @var string
     */
    private $paymentMethod;

    protected function _before()
    {
        parent::_before();
    }

    /*
     * @return void
     */
    protected function setPaymentInvoice()
    {
        $this->accountBrand = PayolutionConstants::BRAND_INVOICE;
        $this->paymentMethod = 'invoice';

        $this->setCustomerTransferTestData();
        $this->setAddressTransferTestData();
        $this->setTotalsTransferTestData();
        $this->setPayolutionPaymentTransferTestData();
        $this->setItemTransferTestData();
        $this->setCartTransferTestData();
        $this->setOrderEntityTestData();
        $this->setCheckoutRequestTransfer();
        $this->setPaymentTestData();
        $this->setOrderTransferTestData();
    }

    /*
     * @return void
     */
    protected function setPaymentInstallment()
    {
        $this->accountBrand = PayolutionConstants::BRAND_INSTALLMENT;
        $this->paymentMethod = 'instalment';

        $this->setCustomerTransferTestData();
        $this->setAddressTransferTestData();
        $this->setTotalsTransferTestData();
        $this->setPayolutionPaymentTransferTestData();
        $this->setItemTransferTestData();
        $this->setCartTransferTestData();
        $this->setOrderEntityTestData();
        $this->setCheckoutRequestTransfer();
        $this->setPaymentTestData();
        $this->setOrderTransferTestData();
    }

    /**
     * @return OrderTransfer
     */
    protected function getOrderTransfer()
    {
        return $this->orderTransfer;
    }

    /**
     * @return SpyPaymentPayolution
     */
    protected function getPaymentEntity()
    {
        return $this->paymentEntity;
    }

    /**
     * @return CheckoutRequestTransfer
     */
    protected function getCheckoutRequestTransfer()
    {
        return $this->checkoutRequestTransfer;
    }

    /**
     * @return void
     */
    protected function setOrderTransferTestData()
    {
        $this->orderTransfer = (new OrderTransfer())
            ->setIsTest(true)
            ->setCustomer($this->customerTransfer)
            ->setPayolutionPayment($this->payolutionPaymentTransfer)
            ->setIdSalesOrder($this->orderEntity->getIdSalesOrder())
            ->setTotals($this->totalsTransfer)
            ->setShippingAddress($this->addressTransfer)
            ->setBillingAddress($this->addressTransfer)
            ->setOrderReference(self::REFERENCE);
    }

    /**
     * @return void
     */
    protected function setPaymentTestData()
    {
        $this->paymentEntity = (new SpyPaymentPayolution())
            ->setFkSalesOrder($this->orderEntity->getIdSalesOrder())
            ->setAccountBrand($this->accountBrand)
            ->setFirstName(self::FIRST_NAME)
            ->setLastName(self::LAST_NAME)
            ->setSalutation(SpyPaymentPayolutionTableMap::COL_SALUTATION_MRS)
            ->setDateOfBirth(self::BIRTH_DATE)
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE)
            ->setStreet(self::STREET)
            ->setZipCode(self::ZIP_CODE)
            ->setCity(self::CITY)
            ->setCountryIso2Code(self::COUNTRY_CODE)
            ->setLanguageIso2Code(self::COUNTRY_CODE)
            ->setCurrencyIso3Code(self::CURRENCY_CODE)
            ->setEmail(self::EMAIL)
            ->setClientIp(self::CLIENT_IP)
            ->setInstallmentAmount(self::INSTALLMENT_AMOUNT)
            ->setInstallmentDuration(self::INSTALLMENT_DURATION)
            ->setBankAccountHolder(self::FIRST_NAME . ' ' . self::LAST_NAME)
            ->setBankAccountBic(self::BIC)
            ->setBankAccountIban(self::IBAN);

        $this->paymentEntity->save();
    }

    protected function setCheckoutRequestTransfer()
    {
        $this->checkoutRequestTransfer = (new CheckoutRequestTransfer())
            ->setIdUser(null)
            ->setShippingAddress($this->addressTransfer)
            ->setBillingAddress($this->addressTransfer)
            ->setPaymentMethod($this->paymentMethod)
            ->setCart($this->cartTransfer)
            ->setPayolutionPayment($this->payolutionPaymentTransfer);
    }

    /**
     * @return void
     */
    protected function setOrderEntityTestData()
    {
        $country = SpyCountryQuery::create()->findOneByIso2Code(self::COUNTRY_CODE);

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
            ->setOrderReference(self::REFERENCE);
        $this->orderEntity->save();
    }

    /**
     * @return void
     */
    protected function setPayolutionPaymentTransferTestData()
    {
        $this->payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAccountBrand($this->accountBrand)
            ->setClientIp(self::CLIENT_IP)
            ->setLanguageIso2Code(self::COUNTRY_CODE)
            ->setCurrencyIso3Code(self::CURRENCY_CODE)
            ->setAddress($this->addressTransfer)
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE)
            ->setDateOfBirth(self::BIRTH_DATE)
            ->setInstallmentAmount(self::INSTALLMENT_AMOUNT)
            ->setInstallmentDuration(self::INSTALLMENT_DURATION)
            ->setBankAccountHolder(self::FIRST_NAME . ' ' . self::LAST_NAME)
            ->setBankAccountBic(self::BIC)
            ->setBankAccountIban(self::IBAN);
    }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    protected function setTotalsTransferTestData()
    {
        $this->totalsTransfer = (new TotalsTransfer())
            ->setGrandTotal(self::TOTAL)
            ->setGrandTotalWithDiscounts(self::TOTAL)
            ->setSubtotal(self::TOTAL);
    }

    /**
     * @return void
     */
    protected function setCartTransferTestData()
    {
        $this->cartTransfer = (new QuoteTransfer())
            ->addItem($this->itemTransfer)
            ->setTotals($this->totalsTransfer);
    }

    /**
     * @return void
     */
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

}
