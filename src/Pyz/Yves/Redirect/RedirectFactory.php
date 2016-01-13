<?php

namespace Pyz\Yves\Redirect;

use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Redirect\ResourceCreator\RedirectResourceCreator;

class RedirectFactory extends AbstractFactory
{

    /**
     * @return RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return new RedirectResourceCreator(
            $this->getLocator()
        );
    }

}
