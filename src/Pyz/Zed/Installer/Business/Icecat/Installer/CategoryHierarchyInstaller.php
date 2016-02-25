<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryHierarchyInstaller extends AbstractIcecatInstaller
{
    protected function getCsvDataFilename()
    {
        return 'categories.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Tree';
    }

}
