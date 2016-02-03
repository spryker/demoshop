<?php

namespace Pyz\Zed\Cms\Communication;

use Spryker\Zed\Cms\Communication\CmsCommunicationFactory as SprykerCmsCommunicationFactory;
use Pyz\Zed\Cms\CmsConfig;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;

/**
 * @method \Pyz\Zed\Cms\CmsConfig getConfig()
 * @method \Pyz\Zed\Cms\Persistence\CmsQueryContainer getQueryContainer()
 */
class CmsCommunicationFactory extends SprykerCmsCommunicationFactory
{
}
