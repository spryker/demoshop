<?php

namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return GlossaryInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->factory->createInternalDemoDataGlossaryInstall($this->locator);
        $installer->setMessenger($messenger);

        return $installer;
    }

}
