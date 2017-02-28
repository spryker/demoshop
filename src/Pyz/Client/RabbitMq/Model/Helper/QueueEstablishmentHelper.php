<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq\Model\Helper;

use Generated\Shared\Transfer\QueueOptionTransfer;
use PhpAmqpLib\Channel\AMQPChannel;

class QueueEstablishmentHelper implements QueueEstablishmentHelperInterface
{

    /**
     * @param AMQPChannel $channel
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return void
     */
    public function createQueue(AMQPChannel $channel, QueueOptionTransfer $queueOptionTransfer)
    {
        $queueParams = $this->convertTransferToArray($queueOptionTransfer);

        $channel
            ->queue_declare(
                $queueParams['queue_name'],
                $queueParams['passive'],
                $queueParams['durable'],
                $queueParams['exclusive'],
                $queueParams['auto_delete']
            );
    }

    /**
     * @param AMQPChannel $channel
     * @param QueueOptionTransfer $queueOptionTransfer
     *
     * @return void
     */
    public function createExchange(AMQPChannel $channel, QueueOptionTransfer $queueOptionTransfer)
    {
        $exchangeParams = $this->convertTransferToArray($queueOptionTransfer);

        $channel
            ->exchange_declare(
                $exchangeParams['queue_name'],
                $exchangeParams['type'],
                $exchangeParams['passive'],
                $exchangeParams['durable'],
                $exchangeParams['auto_delete']
            );
    }

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return array
     */
    protected function convertTransferToArray(QueueOptionTransfer $queueOptionTransfer)
    {
        return $queueOptionTransfer->toArray();
    }

}
