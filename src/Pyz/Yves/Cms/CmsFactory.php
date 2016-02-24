<?php

namespace Pyz\Yves\Cms;

use Pyz\Yves\Cms\ResourceCreator\PageResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

class CmsFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Cms\ResourceCreator\PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return new PageResourceCreator(
            $this->getLocator()
        );
    }

}
