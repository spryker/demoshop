<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller as SprykerAbstractInstaller;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatInstaller extends SprykerAbstractInstaller
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatMapper[]
     */
    protected $mapperCollection;

    /**
     * IcecatInstaller constructor.
     */
    public function __construct(OutputInterface $output, array $mapperCollection)
    {
        $this->output = $output;
        $this->mapperCollection = $mapperCollection;
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Mapper\CategoryMapper
     */
    protected function getCategoryMapper()
    {
        return $this->mapperCollection[InstallerConfig::CATEGORY_RESOURCE];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Mapper\LocaleMapper
     */
    protected function getLocaleMapper()
    {
        return $this->mapperCollection[InstallerConfig::LOCALE_RESOURCE];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Mapper\ProductMapper
     */
    protected function getProductMapper()
    {
        return $this->mapperCollection[InstallerConfig::PRODUCT_RESOURCE];
    }

}
