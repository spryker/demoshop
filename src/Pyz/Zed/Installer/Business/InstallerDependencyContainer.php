<?php

namespace Pyz\Zed\Installer\Business;

use ProjectA\Zed\Installer\Business\InstallerDependencyContainer as SprykerInstallerDependencyContainer;
use Pyz\Zed\Installer\Business\DemoData\CategoryTreeInstaller;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;

class InstallerDependencyContainer extends SprykerInstallerDependencyContainer
{

    /**
     * @return CategoryTreeInstaller
     */
    public function createDemoDataCategoryTreeInstaller()
    {
        return $this->factory->createDemoDataCategoryTreeInstaller(
            $this->locator->category()->facade(),
            $this->locator->category()->queryContainer(),
            $this->locator->locale()->facade(),
            $this->locator
        );
    }

    /**
     * @return ProductDataInstaller
     */
    public function createDemoDataProductInstaller()
    {
        $reader = new CsvFileReader();
        $data = $reader->read(__DIR__ . '/demo-category-tree.csv')->getData();
        return $this->factory->createDemoDataProductInstaller(
            $this->locator->product()->facade(),
            $this->locator->locale()->facade(),
            $data
        );
    }




}
