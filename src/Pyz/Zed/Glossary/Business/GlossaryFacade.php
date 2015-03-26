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
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
