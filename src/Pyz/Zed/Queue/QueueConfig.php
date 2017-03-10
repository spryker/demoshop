<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Queue;

use Generated\Shared\Transfer\QueueOptionTransfer;
use Spryker\Zed\Queue\QueueConfig as SprykerQueueConfig;

class QueueConfig extends SprykerQueueConfig
{

    /**
     * @return array
     */
    protected function getQueueWorkerProcessorCount()
    {
        return [
            'Mail' => 5,
        ];
    }

    /**
     * @return QueueOptionTransfer
     */
    protected function getDefaultQueueReceiverConfig()
    {
        $queueOptionTransfer = new QueueOptionTransfer();
        $queueOptionTransfer->setQueueName('default');
        $queueOptionTransfer->setConsumerTag('');
        $queueOptionTransfer->setNoLocal(false);
        $queueOptionTransfer->setNoAck(false);
        $queueOptionTransfer->setConsumerExclusive(false);
        $queueOptionTransfer->setNoWait(false);

        return $queueOptionTransfer;
    }
}
