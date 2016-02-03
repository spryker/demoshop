<?php

namespace Pyz\Yves\NewRelic;

use Spryker\Shared\NewRelic\Api;
use Spryker\Shared\NewRelic\ApiInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class NewRelicFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Shared\NewRelic\ApiInterface
     */
    public function createNewRelicApi()
    {
        return new Api();
    }
}
