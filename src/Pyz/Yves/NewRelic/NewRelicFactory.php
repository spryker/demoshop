<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NewRelic;

use Spryker\Shared\NewRelicApi\NewRelicApi;
use Spryker\Yves\Kernel\AbstractFactory;

class NewRelicFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Shared\NewRelicApi\NewRelicApiInterface
     */
    public function createNewRelicApi()
    {
        return new NewRelicApi();
    }

    /**
     * @return \Spryker\Service\UtilNetwork\UtilNetworkServiceInterface
     */
    public function getUtilNetworkService()
    {
        return $this->getProvidedDependency(NewRelicDependencyProvider::SERVICE_NETWORK);
    }

}
