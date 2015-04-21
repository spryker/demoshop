<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use SprykerFeature\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{
    /**
     * @param LoggerInterface $messenger
     *
     * @return GlossaryInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataGlossaryInstall($this->getLocator());
        $installer->setMessenger($messenger);

        return $installer;
    }
}
