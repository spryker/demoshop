<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

/**
 * @method GlossaryBusinessFactory getFactory()
 */
class GlossaryFacade extends SprykerGlossaryFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
