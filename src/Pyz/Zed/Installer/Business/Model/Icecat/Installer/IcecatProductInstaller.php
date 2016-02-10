<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Installer;

use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatInstaller;

class IcecatProductInstaller extends AbstractIcecatInstaller
{

    /**
     * @return void
     */
    public function install()
    {
        foreach ($this->mapperCollection as $mapper) {
            dump($mapper);
            die;
        }
    }

}
