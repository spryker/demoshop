<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq\Model\Manager;

use Generated\Shared\Transfer\QueueOptionTransfer;
use Spryker\Client\Queue\Model\Internal\ManagerInterface as SprykerManagerInterface;

interface ManagerInterface extends SprykerManagerInterface
{

    /**
     * @param \Generated\Shared\Transfer\QueueOptionTransfer $queueOptionTransfer
     *
     * @return QueueOptionTransfer
     */
    public function createExchange(QueueOptionTransfer $queueOptionTransfer);

}
