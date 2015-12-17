<?php

namespace Pyz\Zed\Glossary\Communication\Plugin;

use Pyz\Zed\Glossary\Business\GlossaryFacade;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Glossary\Communication\GlossaryCommunicationFactory;

/**
 * @method GlossaryCommunicationFactory getFactory()
 * @method GlossaryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
