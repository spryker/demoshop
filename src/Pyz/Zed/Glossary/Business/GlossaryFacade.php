<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

class GlossaryFacade extends SprykerGlossaryFacade
{
    /**
     * @var GlossaryDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->dependencyContainer->createDemoDataInstaller($logger)->install();
    }
}
