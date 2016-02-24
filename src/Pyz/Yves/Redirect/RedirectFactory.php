<?php

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
        return new RedirectResourceCreator(
            $this->getLocator()
        );
    }

}
