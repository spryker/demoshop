<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq\Model\Connection;

interface ConnectionInterface
{

    /**
     * @return \PhpAmqpLib\Channel\AMQPChannel
     */
    public function getChannel();
}
