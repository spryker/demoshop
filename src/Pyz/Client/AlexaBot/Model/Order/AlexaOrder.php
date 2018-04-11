<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Order;

use ArrayObject;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\DummyPaymentTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Shared\Transfer\TaxTotalTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Product\ProductClientInterface;
use Twilio\Rest\Client;

class AlexaOrder extends AbstractPlugin implements AlexaOrderInterface
{
    const ALEXA_DEVICE = "alexa-test";
    const TWILLIO_SID = '';
    const TWILLIO_TOKEN = '';
    const TWILLIO_NUMBER = '';
    const NUMBER_RECIPIENT = '';

    const ORDER_SESSION_NAME = 'alexa-order.session';

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    private $cartClient;

    /**
     * @var CheckoutClientInterface
     */

    private $checkoutClient;

    /**
     * @var CalculationClientInterface
     */

    private $calculationClient;

    /**
     * @var ProductClientInterface
     */

    private $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    private $storageProductMapper;

    /**
     * AlexaOrder constructor.
     *
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     */
    public function __construct(
        CartClientInterface $cartClient,
        CheckoutClientInterface $checkoutClient,
        CalculationClientInterface $calculationClient,
        ProductClientInterface $productClient,
        StorageProductMapperInterface $storageProductMapper
    ) {
        $this->cartClient = $cartClient;
        $this->checkoutClient = $checkoutClient;
        $this->calculationClient = $calculationClient;
        $this->productClient = $productClient;
        $this->storageProductMapper = $storageProductMapper;
    }

    /**
     * @param string $concreteSku
     *
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku)
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($concreteSku);
        $itemTransfer->setQuantity(1);
        $itemTransfer->setIdDiscountPromotion(0);

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);

        $quoteSerialised = serialize($quoteTransfer);
        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::ORDER_SESSION_NAME;
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
     * @return string|false
     */
    public function performCheckout()
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::ORDER_SESSION_NAME;
        $objData = file_get_contents($filePath);
        /** @var \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer */
        $quoteTransfer = unserialize($objData);

        $itemsArray = $quoteTransfer->getItems();

        $quoteTransfer = $this->hydrateCustomer($quoteTransfer);
        $quoteTransfer = $this->hydrateAddress($quoteTransfer);
        $quoteTransfer = $this->hydrateShipment($quoteTransfer);
        $quoteTransfer = $this->hydratePayment($quoteTransfer);
        $quoteTransfer->setCheckoutConfirmed(true);

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);
        $checkoutClient = $this->checkoutClient->placeOrder($quoteTransfer);

        if ($checkoutClient->getIsSuccess() &&
            isset($itemsArray[0])
            && $itemsArray[0]->getName()
        ) {
            $response = "You ordered " . $quoteTransfer->getItems()[0]->getName() . ". ";
            $response .= "Your order is being delivered. Remember to smile";

            // Delete the session file
            $filePath = getcwd() . DIRECTORY_SEPARATOR . self::ORDER_SESSION_NAME;
            $fp = fopen($filePath, "w");
            fwrite($fp, '');
            fclose($fp);

            return $response;
        } elseif ($checkoutClient->getErrors()->count()) {
            return "There was an error with your request. "
                . "-" . $checkoutClient->getErrors()[0]->getMessage() . "-. "
                . "Please try again later";
        }

        return false;
    }

    /**
     * @param $abstractId
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function getStorageProduct($abstractId, $selectedAttributes = [])
    {
        $productData = $this
            ->productClient
            ->getProductAbstractFromStorageByIdForCurrentLocale($abstractId);

        $storageProductTransfer = $this
            ->storageProductMapper
            ->mapStorageProduct($productData, $selectedAttributes);

        return $storageProductTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function hydrateCustomer($quoteTransfer)
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
     *
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
     *
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

    /**
     * @throws \Twilio\Exceptions\ConfigurationException
     * @return void
     */
    public function sendConfirmationSms()
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::ORDER_SESSION_NAME;
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
                        . ' ordered ' . $quoteTransfer->getItems()[0]->getName(),
                ]
            );
        }
    }
}
