<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Client\RabbitMq;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\RabbitMq\RabbitMqFactory getFactory()
 */
class RabbitMqClient extends AbstractClient implements RabbitMqClientInterface
{

    /**
     * @return \Spryker\Client\Queue\Model\Adapter\AdapterInterface
     */
    public function createQueueAdapter()
    {
        return $this->getFactory()->createQueueAdapter();
    }
}
