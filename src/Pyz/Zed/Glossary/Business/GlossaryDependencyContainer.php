<?php

namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{

    /**
     * @param LoggerInterface $logger
     *
     * @return GlossaryInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataGlossaryInstall($this->locator);
        $installer->setLogger($logger);

        return $installer;
    }

}
