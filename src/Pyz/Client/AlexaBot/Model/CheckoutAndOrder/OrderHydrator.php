<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\CheckoutAndOrder;

use ArrayObject;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\DummyPaymentTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Shared\Transfer\TaxTotalTransfer;
use Generated\Shared\Transfer\TotalsTransfer;

class OrderHydrator
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function hydrateCustomer($quoteTransfer)
    {
        $guestCustomer = new CustomerTransfer();
        $guestCustomer->setIsGuest(true);
        $guestCustomer->setFirstName('Test');
        $guestCustomer->setLastName('User');
        $guestCustomer->setEmail('alexa@spryker.com');
        $guestCustomer->setGender('m');
        $guestCustomer->setSalutation('Mr');

        $quoteTransfer->setCustomer($guestCustomer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function hydrateAddress($quoteTransfer)
    {
        $newCountry = new CountryTransfer();
        $newCountry->setIdCountry(60);
        $newCountry->setIso2Code('DE');
        $newCountry->setIso3Code('DEU');
        $newCountry->setName('Germany');
        $newCountry->setPostalCodeMandatory(true);
        $newCountry->setPostalCodeRegex('\d{5}');

        $newAddress = new AddressTransfer();
        $newAddress->setSalutation('Mr');
        $newAddress->setFirstName('Test');
        $newAddress->setLastName('User');
        $newAddress->setEmail('alexa@spryker.com');
        $newAddress->setPhone('+4915901009896');
        $newAddress->setAddress1('Julie Wolforn Strasse');
        $newAddress->setAddress2('1');
        $newAddress->setZipCode('10115');
        $newAddress->setCity('Berlin');
        $newAddress->setIso2Code('DE');
        $newAddress->setCompany('Spryker Systems GmbH');
        $newAddress->setCountry($newCountry);

        $newAddress->setIsDefaultShipping(true);
        $newAddress->setIsDefaultBilling(true);

        $quoteTransfer->setShippingAddress($newAddress);
        $quoteTransfer->setBillingAddress($newAddress);
        $quoteTransfer->setBillingSameAsShipping(true);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function hydrateShipment($quoteTransfer)
    {
        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setIdShipmentMethod(1);
        $shipmentMethodTransfer->setFkShipmentCarrier(1);
        $shipmentMethodTransfer->setFkTaxSet(1);
        $shipmentMethodTransfer->setName('Same Minute Delivery');
        $shipmentMethodTransfer->setIsActive(true);
        $shipmentMethodTransfer->setStoreCurrencyPrice(599);
        $shipmentMethodTransfer->setCurrencyIsoCode('EUR');
        $shipmentMethodTransfer->setCarrierName('Spryker');
        $shipmentMethodTransfer->setTaxRate(19);
        $shipmentMethodTransfer->setFkSalesExpense(1);

        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setIdShipmentCarrier(1);
        $shipmentCarrierTransfer->setIsActive(true);
        $shipmentCarrierTransfer->setName('Spryker');

        $shipmentTransfer = new ShipmentTransfer();
        $shipmentTransfer->setCarrier($shipmentCarrierTransfer);
        $shipmentTransfer->setMethod($shipmentMethodTransfer);
        $shipmentTransfer->setShipmentSelection('1');

        $quoteTransfer->setShipment($shipmentTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function hydratePayment($quoteTransfer)
    {
        $dummyPaymentInvoice = new DummyPaymentTransfer();
        $dummyPaymentInvoice->setDateOfBirth('1979-12-07');

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setAmount(1198);
        $paymentTransfer->setDummyPaymentInvoice($dummyPaymentInvoice);
        $paymentTransfer->setDummyPayment($dummyPaymentInvoice);
        $paymentTransfer->setDummyPaymentCreditCard($dummyPaymentInvoice);
        $paymentTransfer->setPaymentSelection('dummyPaymentInvoice');
        $paymentTransfer->setPaymentProvider('DummyPayment');
        $paymentTransfer->setPaymentMethod('invoice');

        $taxTotalTransfer = new TaxTotalTransfer();
        $taxTotalTransfer->setAmount(191);
        $taxTotalTransfer->setTaxRate(1);
        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer->setExpenseTotal(599);
        $totalsTransfer->setSubtotal(599);
        $totalsTransfer->setDiscountTotal(0);
        $totalsTransfer->setGrandTotal(1198);
        $totalsTransfer->setNetTotal(1007);
        $totalsTransfer->setPriceToPay(1198);
        $totalsTransfer->setRefundTotal(1198);
        $totalsTransfer->setTaxTotal($taxTotalTransfer);
        $totalsTransfer->setHash('c18a8ad752fb7e649161dcabed2d1fb96fa38265866c1e8d123ba292aa23f1de');
        $quoteTransfer->setTotals($totalsTransfer);

        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType('SHIPMENT_EXPENSE_TYPE');
        $expenseTransfer->setUnitGrossPrice(599);
        $expenseTransfer->setSumGrossPrice(599);
        $expenseTransfer->setName('Same Minute Delivery');
        $expenseTransfer->setTaxRate(19);
        $expenseTransfer->setQuantity(1);
        $expenseTransfer->setUnitPrice(599);
        $expenseTransfer->setSumPrice(599);
        $expenseTransfer->setRefundableAmount(599);
        $expenseTransfer->setUnitTaxAmount(95);
        $expenseTransfer->setSumTaxAmount(95);

        $quoteTransfer->setExpenses(new ArrayObject([ 0 => $expenseTransfer]));
        $quoteTransfer->setPayment($paymentTransfer);

        return $quoteTransfer;
    }
}
