<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Mail\Communication\Plugin;

use Generated\Shared\Transfer\QueueMessageTransfer;
use Spryker\Zed\Queue\Dependency\Plugin\QueueMessageProcessorInterface;

class MailQueueMessageProcessorPlugin implements QueueMessageProcessorInterface
{

    /**
     * @param QueueMessageTransfer[] $queueMessageTransfers
     *
     * @return QueueMessageTransfer[]
     */
    public function processMessages(array $queueMessageTransfers)
    {
        foreach ($queueMessageTransfers as $queueMessageTransfer) {
            $errorNumber = 0;
            $errorChance = rand (0,1);

            sleep($errorChance * 1);

            if ($errorChance === $errorNumber) {
                echo '[ XX ] Failed '. $queueMessageTransfer->getBody() . "\r\n";
                $queueMessageTransfer->setHasError(true);
                $queueMessageTransfer->setReject(true);
                continue;
            }
            echo '[ OK ] Sending Mail to '. $queueMessageTransfer->getBody() . "\r\n";
            $queueMessageTransfer->setAcknowledge(true);
        }

        return $queueMessageTransfers;
    }

    /**
     * @return int
     */
    public function getChunkSize()
    {
        return 5;
    }
}
