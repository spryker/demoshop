<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

class GlossaryFacade extends SprykerGlossaryFacade
{
    /**
     * @return GlossaryDependencyContainer
     */
    protected function getDependencyContainer()
    {
        return $this->dependencyContainer;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($logger)->install();
    }
}
