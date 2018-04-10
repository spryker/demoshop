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
     * @throws ContainerKeyNotFoundException
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku)
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($concreteSku);
        $itemTransfer->setQuantity(1);

        $quoteTransfer = $this->getFactory()->getCartClient()->addItem($itemTransfer);
        $this->getFactory()->getCartClient()->storeQuote($quoteTransfer);

        $itemsArray = $quoteTransfer->getItems();
        if (isset($itemsArray[0]) && $itemsArray[0]->getSku() === $concreteSku) {
            return true;
        }

        return false;
    }

    /**
     * @return string|false
     * @throws ContainerKeyNotFoundException
     */
    public function performCheckout()
    {
        $quoteTransfer  = $this->getFactory()->getCartClient()->getQuote();
        $itemsArray     = $quoteTransfer->getItems();

        $quoteTransfer = $this->hydrateCustomer($quoteTransfer);
        $quoteTransfer = $this->hydrateAddress($quoteTransfer);
        $quoteTransfer = $this->hydrateShipment($quoteTransfer);
        $quoteTransfer = $this->hydratePayment($quoteTransfer);
        $quoteTransfer->setCheckoutConfirmed(true);

        $checkoutClient = $this->getFactory()->getCheckoutClient()->placeOrder($quoteTransfer);

        if (
            //$checkoutClient->getIsSuccess() &&
            isset($itemsArray[0])
            && $itemsArray[0]->getName()
        ) {
            $response = "You ordered " . $quoteTransfer->getItems()[0]->getName() . ". ";
            $response .= "Your order is being delivered. Remember to smile";

            return $response;
        } else if ($checkoutClient->getErrors()->count()) {
            return "There was an error with your request. "
                . "-" . $checkoutClient->getErrors()[0]->getMessage() . "-. "
                . "Please try again later";
        }

        return false;

    }

    /**
     * @throws ContainerKeyNotFoundException
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public function sendConfirmationSms()
    {
        $client = new Client(self::TWILLIO_SID, self::TWILLIO_TOKEN);

        $quoteTransfer = $this->getFactory()->getCartClient()->getQuote();

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
        $newAddress->setAddress1('Julie Wolforn Strasse');
        $newAddress->setAddress2('1');
        $newAddress->setZipCode('10115');
        $newAddress->setCity('Berlin');
        $newAddress->setCountry($newCountry);

        $newAddress->setIsDefaultShipping(true);
        $newAddress->setIsDefaultBilling(true);

        $quoteTransfer->setShippingAddress($newAddress);
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

        // This is taken from spy_shipment_carrier ROW
        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setIdShipmentCarrier(1);
        $shipmentCarrierTransfer->setIsActive(true);
        $shipmentCarrierTransfer->setName('Spryker');

        $shipmentTransfer = new ShipmentTransfer();
        $shipmentTransfer->setCarrier($shipmentCarrierTransfer);
        $shipmentTransfer->setMethod($shipmentMethodTransfer);
        $shipmentTransfer->setShipmentSelection('Same Minute Delivery');

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
        $dummyPaymentInvoice->setDateOfBirth('07.12.1979');

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setAmount(1200);
        $paymentTransfer->setDummyPaymentInvoice($dummyPaymentInvoice);
        $paymentTransfer->setPaymentSelection('DummyPayment');

        $quoteTransfer->setPayment($paymentTransfer);
        return $quoteTransfer;
    }

}
