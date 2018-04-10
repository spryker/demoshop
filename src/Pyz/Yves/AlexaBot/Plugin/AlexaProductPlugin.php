<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\DummyPaymentTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Twilio\Rest\Client;

/**
 * @method \Pyz\Yves\AlexaBot\AlexaBotFactory getFactory()
 */
class AlexaProductPlugin extends AbstractPlugin implements AlexaProductPluginInterface
{

    const ALEXA_DEVICE = "alexa-test";
    const TWILLIO_SID  = '';
    const TWILLIO_TOKEN = '';
    const TWILLIO_NUMBER = '';
    const NUMBER_RECIPIENT = '';

    /**
     * @param int $abstractId
     * @throws ContainerKeyNotFoundException
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId)
    {
        $storageProductTransfer = $this->getStorageProduct($abstractId);
        return $storageProductTransfer->getSuperAttributes()['variant'];
    }

    /**
     * @param int $abstractId
     * @param string $variantName
     * @throws ContainerKeyNotFoundException
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName)
    {
        $selectedAttributes = ['variant' => $variantName];

        $storageProductTransfer = $this->getStorageProduct($abstractId, $selectedAttributes);
        return $storageProductTransfer->getSku();
    }

    /**
     * @param string $concreteSku
     * @param int $sessionId
     * @throws ContainerKeyNotFoundException
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku, $sessionId)
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($concreteSku);
        $itemTransfer->setQuantity(1);
        $itemTransfer->setIdDiscountPromotion(0);

        $quoteTransfer = $this->getFactory()->getCartClient()->addItem($itemTransfer);

        $quoteSerialised = serialize($quoteTransfer);
        $filePath = getcwd().DIRECTORY_SEPARATOR.$sessionId.".session";
        $fp = fopen($filePath, "w");
        fwrite($fp, $quoteSerialised);
        fclose($fp);

        $itemsArray = $quoteTransfer->getItems();
        if (isset($itemsArray[0]) && $itemsArray[0]->getSku() === $concreteSku) {
            return true;
        }

        return false;
    }

    /**
     * @param int $sessionId
     * @return string|false
     * @throws ContainerKeyNotFoundException
     */
    public function performCheckout($sessionId)
    {
        $filePath = getcwd().DIRECTORY_SEPARATOR.$sessionId.".session";
        $objData = file_get_contents($filePath);
        /** @var \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer */
        $quoteTransfer = unserialize($objData);

        $itemsArray     = $quoteTransfer->getItems();

        $quoteTransfer = $this->hydrateCustomer($quoteTransfer);
        $quoteTransfer = $this->hydrateAddress($quoteTransfer);
        $quoteTransfer = $this->hydrateShipment($quoteTransfer);
        $quoteTransfer = $this->hydratePayment($quoteTransfer);
        $quoteTransfer->setCheckoutConfirmed(true);

        $quoteTransfer = $this->getFactory()->getCalculationClient()->recalculate($quoteTransfer);
        $checkoutClient = $this->getFactory()->getCheckoutClient()->placeOrder($quoteTransfer);

        if (
            $checkoutClient->getIsSuccess() &&
            isset($itemsArray[0])
            && $itemsArray[0]->getName()
        ) {
            $response = "You ordered " . $quoteTransfer->getItems()[0]->getName() . ". ";
            $response .= "Your order is being delivered. Remember to smile";

            // Delete the session file, otherwise
            // just get overwritten by next order

            return $response;
        } else if ($checkoutClient->getErrors()->count()) {
            return "There was an error with your request. "
                . "-" . $checkoutClient->getErrors()[0]->getMessage() . "-. "
                . "Please try again later";
        }

        return false;

    }

    /**
     * @param int $sessionId
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public function sendConfirmationSms($sessionId)
    {
        $filePath = getcwd().DIRECTORY_SEPARATOR.$sessionId.".session";
        $objData = file_get_contents($filePath);
        /** @var \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer */
        $quoteTransfer = unserialize($objData);

        if (isset($quoteTransfer->getItems()[0])) {
            $client = new Client(self::TWILLIO_SID, self::TWILLIO_TOKEN);

            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
                self::NUMBER_RECIPIENT,
                [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => self::TWILLIO_NUMBER,
                    // the body of the text message you'd like to send
                    'body' => 'User: ' . self::ALEXA_DEVICE
                        // It should be field 'name' in 'spy_sales_order_item'
                        . ' ordered ' . $quoteTransfer->getItems()[0]->getName()
                ]
            );
        }
    }

    /**
     * @param $abstractId
     * @param array $selectedAttributes
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     * @throws ContainerKeyNotFoundException
     */
    protected function getStorageProduct($abstractId, $selectedAttributes = [])
    {
        $productData = $this
            ->getFactory()
            ->getProductClient()
            ->getProductAbstractFromStorageByIdForCurrentLocale(
                $abstractId
            );

        $storageProductTransfer = $this->getFactory()
            ->createStorageProductMapper()
            ->mapStorageProduct($productData, $selectedAttributes);

        return $storageProductTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function hydrateCustomer($quoteTransfer)
    {
        $guestCustomer = new \Generated\Shared\Transfer\CustomerTransfer();
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function hydrateAddress($quoteTransfer)
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function hydrateShipment($quoteTransfer)
    {
        // This is taken from spy_shipment_method ROW
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

        // This is taken from spy_shipment_carrier ROW
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function hydratePayment($quoteTransfer)
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

        $taxTotalTransfer = new \Generated\Shared\Transfer\TaxTotalTransfer();
        $taxTotalTransfer->setAmount(191);
        $taxTotalTransfer->setTaxRate(1);
        $totalsTransfer = new \Generated\Shared\Transfer\TotalsTransfer();
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

        $expenseTransfer = new \Generated\Shared\Transfer\ExpenseTransfer();
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

        $quoteTransfer->setExpenses(new \ArrayObject([ 0 => $expenseTransfer]));
        $quoteTransfer->setPayment($paymentTransfer);
        return $quoteTransfer;
    }

}
