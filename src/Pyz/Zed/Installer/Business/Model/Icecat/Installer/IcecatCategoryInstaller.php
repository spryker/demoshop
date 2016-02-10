<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Installer;

use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatInstaller;
use Pyz\Zed\Installer\InstallerConfig;

class IcecatCategoryInstaller extends AbstractIcecatInstaller
{

    /**
     * @return void
     */
    public function install()
    {
        /*
         * @var \Pyz\Zed\Installer\Business\Model\Icecat\Mapper\CategoryMapper $categoryMapper
         */
        $categoryMapper = $this->mapperCollection[InstallerConfig::CATEGORY_MAPPER];

        $xml = $categoryMapper->getXml();

        dump($xml);
    }

}
