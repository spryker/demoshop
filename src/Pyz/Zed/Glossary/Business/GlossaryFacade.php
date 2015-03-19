<?php

namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;
use Psr\Log\LoggerInterface;

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
        $this->dependencyContainer->getDemoDataInstaller($logger)->install();
    }
}
