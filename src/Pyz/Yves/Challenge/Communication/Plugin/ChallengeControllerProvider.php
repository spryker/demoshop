<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Challenge\Communication\Plugin;

use Pyz\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class ChallengeControllerProvider extends YvesControllerProvider
{

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/hello', 'hello', 'Challenge', 'Basics', 'hello');
    }

}
