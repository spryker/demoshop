<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use SprykerFeature\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{
    /**
     * @param LoggerInterface $logger
     *
     * @return GlossaryInstall
     */
    public function createDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->getFactory()->createInternalDemoDataGlossaryInstall($this->locator);
        $installer->setLogger($logger);

        return $installer;
    }
}
