<?php

namespace Pyz\Zed\Cms\Component\Internal;

use Generated\Zed\Cms\Component\CmsFactory;

/**
 * @property CmsFactory $factory
 */
class Install extends \ProjectA\Zed\Cms\Component\Internal\Install
{
    /**
     * @return string|void
     */
    public function install()
    {
        parent::install();
        $this->factory->createModelDemoShopInstall()->install();
    }
}

