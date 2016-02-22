<?php

namespace Pyz\Zed\Glossary\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\Glossary\Communication\GlossaryCommunicationFactory getFactory()
 * @method \Pyz\Zed\Glossary\Business\GlossaryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
