<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq\Model\Helper;

use Generated\Shared\Transfer\QueueOptionTransfer;
use PhpAmqpLib\Channel\AMQPChannel;

interface QueueEstablishmentHelperInterface
{

    /**
     * @param AMQPChannel $channel
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueOptionTransfer
     */
    public function createQueue(AMQPChannel $channel, QueueOptionTransfer $queueOptionTransfer);


    /**
     * @param AMQPChannel $channel
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueOptionTransfer
     */
    public function createExchange(AMQPChannel $channel, QueueOptionTransfer $queueOptionTransfer);
}
