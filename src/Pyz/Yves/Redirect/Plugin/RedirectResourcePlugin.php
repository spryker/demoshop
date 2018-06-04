<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Redirect\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Redirect\RedirectFactory getFactory()
 */
class RedirectResourcePlugin extends AbstractPlugin
{
    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface
     */
    public function createRedirectResourceCreator()
    {
        return $this->getFactory()->createRedirectResourceCreator();
    }
}
