<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use Spryker\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

/**
 * @method GlossaryBusinessFactory getFactory()
 */
class GlossaryFacade extends SprykerGlossaryFacade implements
    CmsToGlossaryInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
