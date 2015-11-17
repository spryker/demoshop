<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use PavFeature\Zed\ProductDynamicImporter\Business\ProductDynamicImporterFacade;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class ProductDataInstall extends AbstractInstaller
{

    protected $filePath;
    protected $productDynamicImporterFacade;

    /**
     * @param ProductDynamicImporterFacade $productDynamicImporterFacade
     * @param string $filePath
     */
    public function __construct(
        ProductDynamicImporterFacade $productDynamicImporterFacade,
        $filePath
    ) {
        $this->filePath = $filePath;
        $this->productDynamicImporterFacade = $productDynamicImporterFacade;
    }

    public function install()
    {
        $this->info('This will install some demo products and related attributes');

        $this->createProducts();
    }

    protected function createProducts()
    {
        $jsonString = file_get_contents(($this->filePath));

        $jsonObject = json_decode($jsonString);

        if ($jsonObject === null) {
            throw new \Exception('Demodata for products could not be loaded due to erros in the json');
        }


        foreach ($jsonObject as $one) {
            $product = $this->productDynamicImporterFacade->convertJsonToProductImporterAbstractProduct(json_encode($one));
            $validationResult = $this->productDynamicImporterFacade->validateProductImporterAbstractProduct($product);
            if ($validationResult->hasErrors()) {
                var_dump($validationResult);
                throw new \Exception('Demodata for products were not valid');
            }
            $this->productDynamicImporterFacade->persistProductImporterAbstractProduct($product);
        }
    }
}
