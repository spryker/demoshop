<?php

namespace Pyz\Zed\Cms\Communication;

use Spryker\Zed\Cms\Communication\CmsCommunicationFactory as SprykerCmsCommunicationFactory;
use Pyz\Zed\Cms\CmsConfig;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;

/**
 * @method CmsConfig getConfig()
 * @method CmsQueryContainer getQueryContainer()
 */
class CmsCommunicationFactory extends SprykerCmsCommunicationFactory
{
}
