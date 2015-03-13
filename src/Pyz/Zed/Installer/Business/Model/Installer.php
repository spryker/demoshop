<?php

namespace Pyz\Zed\Installer\Business\Model;

use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeInterface;
use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeTrait;
use ProjectA\Zed\Installer\Business\Model\Installer as CoreInstaller;
use ProjectA\Zed\Kernel\Locator;

/**
 * Class Installer
 *
 * @package Pyz\Zed\Installer\Business\Model
 */
class Installer extends CoreInstaller implements AclFacadeInterface
{
    use AclFacadeTrait;

    /**
     * @var \Generated\Zed\Ide\AutoCompletion
     */
    protected $locator;

    /**
     * constructor
     */
    public function __construct()
    {
        // TODO this must be injected
        $this->locator = Locator::getInstance();
    }

    /**
     * @return array
     */
    protected function getInstaller()
    {
        $frontendExporterFacade = $this->locator->frontendExporter()->facade();
        $productFacade = $this->locator->product()->facade();
        $productSearchFacade = $this->locator->productSearch()->facade();
        $priceFacade = $this->locator->price()->facade();
        return [
            $this->facadeAcl->createInternalInstall(),
            $this->locator->misc()->facade()->createInternalInstall(),
            $this->locator->sales()->facade()->createInternalInstall(),
            $productFacade->createInternalInstall(),
            $frontendExporterFacade->createInternalInstall(),
            $productSearchFacade->createInternalInstall(),
            $priceFacade->createInternalInstall()
        ];
    }
}
