<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Queue;

use Pyz\Zed\Mail\Communication\Plugin\MailQueueMessageProcessorPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Queue\Dependency\Plugin\QueueMessageProcessorInterface;
use Spryker\Zed\Queue\QueueDependencyProvider as SprykerDependencyProvider;

class QueueDependencyProvider extends SprykerDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return QueueMessageProcessorInterface[]
     */
    protected function getProcessorMessagePlugins(Container $container)
    {
        return [
            'Mail' => new MailQueueMessageProcessorPlugin()
        ];
    }

}
