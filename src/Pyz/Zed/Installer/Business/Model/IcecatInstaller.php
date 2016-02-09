<?php

namespace Pyz\Zed\Installer\Business;


class IcecatInstaller extends \Spryker\Zed\Installer\Business\Model\IcecatInstaller
{

    protected function installCategories()
    {
        $this->info('Categories');
    }

    protected function installGlossary()
    {
        $this->info('Glossary');
    }

    protected function installProducts()
    {
        $this->info('Products');
    }

}
