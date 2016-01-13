<?php

namespace Pyz\Yves\Redirect\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Redirect\RedirectFactory;

/**
 * @method RedirectFactory getFactory()
 */
class RedirectResourceCreator extends AbstractPlugin
{

    /**
     * @return RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return $this->getFactory()->createRedirectResourceCreator();
    }

}
