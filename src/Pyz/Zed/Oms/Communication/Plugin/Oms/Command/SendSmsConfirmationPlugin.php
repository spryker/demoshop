<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;
use Twilio\Rest\Client;

class SendSmsConfirmationPlugin extends AbstractCommand implements CommandByOrderInterface
{
    const ALEXA_DEVICE = "alexa-test";
    const TWILLIO_SID  = 'AC96000d7e094ebbc905fec13be2baf015';
    const TWILLIO_TOKEN = 'd0b39e958c375a956a556ee3973296a2';
    const TWILLIO_NUMBER = '+33644609799';
    const NUMBER_RECIPIENT = '+4915901009896';

    /**
     * @param array $orderItems
     * @param SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     *
     * @throws \Twilio\Exceptions\ConfigurationException
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . 'alexa-cart.session';
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

        return [];
    }
}
