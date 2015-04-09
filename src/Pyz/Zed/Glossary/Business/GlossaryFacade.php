<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

class GlossaryFacade extends SprykerGlossaryFacade implements
    CmsToGlossaryInterface
{
    /**
     * @return GlossaryDependencyContainer
     */
    protected function getDependencyContainer()
    {
        return $this->dependencyContainer;
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
