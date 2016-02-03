<?php

namespace Pyz\Yves\Redirect\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Redirect\RedirectFactory;

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
