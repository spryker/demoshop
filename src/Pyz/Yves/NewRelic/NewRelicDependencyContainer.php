<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\NewRelic;

use Spryker\Shared\NewRelic\Api;
use Spryker\Shared\NewRelic\ApiInterface;
use Spryker\Yves\Kernel\AbstractDependencyContainer;

class NewRelicDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return ApiInterface
     */
    public function createNewRelicApi()
    {
        return new Api();
    }
}
