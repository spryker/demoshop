<?php

namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
 */
class GlossaryFacade extends SprykerGlossaryFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }
}
