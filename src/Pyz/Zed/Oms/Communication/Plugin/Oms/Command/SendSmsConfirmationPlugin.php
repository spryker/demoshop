<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Oms\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;
use Twilio\Rest\Client;

class SendSmsConfirmationPlugin extends AbstractCommand implements CommandByOrderInterface
{
    // We should take session-id from the controller
    const ALEXA_DEVICE = "alexa-test";

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @throws \Twilio\Exceptions\ConfigurationException
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        // Your Account SID and Auth Token from twilio.com/console

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
                    . ' ordered ' . $orderItems[0]->getName()
            ]
        );

        return [];
    }
}
