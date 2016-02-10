<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Installer;

use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatInstaller;

class IcecatLocaleInstaller extends AbstractIcecatInstaller
{

    /**
     * @return void
     */
    public function install()
    {
        $xml = $this->getLocaleMapper()->getXml();

        dump($xml);
    }

}
