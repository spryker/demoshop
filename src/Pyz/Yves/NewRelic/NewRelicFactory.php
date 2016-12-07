<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NewRelic;

use Spryker\Shared\NewRelic\NewRelicApi;
use Spryker\Yves\Kernel\AbstractFactory;

class NewRelicFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Shared\NewRelic\NewRelicApiInterface
     */
    public function createNewRelicApi()
    {
        return new NewRelicApi();
    }

}
