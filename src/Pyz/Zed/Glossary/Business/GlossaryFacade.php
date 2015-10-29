<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
 */
class GlossaryFacade extends SprykerGlossaryFacade implements
    CmsToGlossaryInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @return array
     */
    public function importTranslationFromRemoteCSV()
    {
        return $this->getDependencyContainer()->createRemoteCSV()->import();
    }

}
