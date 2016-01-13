<?php

namespace Pyz\Yves\Collector\Plugin;

use Pyz\Yves\Collector\CollectorFactory;
use Pyz\Yves\Collector\Mapper;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method CollectorFactory getFactory()
 */
class UrlMapper extends AbstractPlugin
{

    /**
     * @return Mapper\UrlMapper
     */
    public function createUrlMapper()
    {
        return $this->getFactory()->createUrlMapper();
    }

}
