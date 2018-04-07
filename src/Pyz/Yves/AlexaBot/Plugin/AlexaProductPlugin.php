<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin;

use Generated\Shared\Transfer\ItemTransfer;
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
        $quoteTransfer = $this->getFactory()->getCartClient()->getQuote();

        // @todo We need to perfrom the CHECKOUT on the $quoteTransfer

        $itemsArray = $quoteTransfer->getItems();

        if (isset($itemsArray[0]) && $itemsArray[0]->getName()) {
            $response = "You ordered " . $quoteTransfer->getItems()[0]->getName() . ". ";
            $response .= "Your order is being delivered. Remember to smile";

            return $response;
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
}
