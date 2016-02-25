<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Symfony\Component\Console\Output\OutputInterface;

class ProductInstaller extends AbstractIcecatInstaller
{
    protected function getCsvDataFilename()
    {
        return 'products.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Products';
    }

}
