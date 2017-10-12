<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Redirect;

use Pyz\Yves\Redirect\ResourceCreator\RedirectResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

class RedirectFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Yves\Redirect\ResourceCreator\RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return new RedirectResourceCreator();
    }
}
