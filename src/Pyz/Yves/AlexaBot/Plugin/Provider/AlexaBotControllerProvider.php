<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class AlexaBotControllerProvider extends AbstractYvesControllerProvider
{
    const ALEXA_GET_ABSTRACT = 'alexa/variant';
    const ALEXA_GET_CONCRETE = 'alexa/concrete';
    const ALEXA_GET_PAYMENT  = 'alexa/payment';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{alexa}/variant', static::ALEXA_GET_ABSTRACT, 'AlexaBot', 'Index', 'index')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa')
            ->value('alexa', 'alexa');

        $this->createGetController('/{alexa}/concrete', static::ALEXA_GET_CONCRETE, 'AlexaBot', 'Index', 'concrete')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa')
            ->value('alexa', 'alexa');

        $this->createGetController('/{alexa}/payment', static::ALEXA_GET_PAYMENT, 'AlexaBot', 'Index', 'payment')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa')
            ->value('alexa', 'alexa');
    }
}
