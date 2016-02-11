<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

/**
 * @method \Pyz\Zed\Glossary\Business\GlossaryBusinessFactory getFactory()
 */
class GlossaryFacade extends SprykerGlossaryFacade implements GlossaryFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
