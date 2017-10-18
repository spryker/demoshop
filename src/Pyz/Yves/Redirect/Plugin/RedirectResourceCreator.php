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
class RedirectResourceCreator extends AbstractPlugin
{
    /**
     * @return \Pyz\Yves\Redirect\Plugin\RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return $this->getFactory()->createRedirectResourceCreator();
    }
}
