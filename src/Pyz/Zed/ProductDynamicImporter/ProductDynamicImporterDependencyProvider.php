<?php

namespace Pyz\Zed\ProductDynamicImporter;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRuleSetProviderInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use PavFeature\Zed\ProductDynamicImporter\ProductDynamicImporterDependencyProvider as PavProductDynamicImporterDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductDynamicImporterDependencyProvider extends PavProductDynamicImporterDependencyProvider
{

    /**
     * @param Container $container
     * @return ProductWriterProviderInterface[]
     */
    protected function getProductImporterWriterProvider(Container $container)
    {
        return [
            $container->getLocator()->petsDeliImporterWriter()->pluginProductWriterProvider()->getProvider()
        ];
    }

    /**
     * @param Container $container
     * @return ValidationRuleSetProviderInterface[]
     */
    protected function getProductImporterRulesetProvider(Container $container)
    {
        return [
            $container->getLocator()->petsDeliImporterValidators()->facade()
        ];
    }

}