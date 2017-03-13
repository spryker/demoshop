<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ImporterDependencyProvider extends AbstractBundleDependencyProvider
{

    const SERVICE_DATA = 'util data service';

    const FACADE_CATEGORY = 'FACADE_CATEGORY';
    const FACADE_CMS = 'FACADE_CMS';
    const FACADE_LOCALE = 'FACADE_LOCALE';
    const FACADE_GLOSSARY = 'FACADE_GLOSSARY';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_PRODUCT_MANAGEMENT = 'FACADE_PRODUCT_MANAGEMENT';
    const FACADE_PRODUCT_SEARCH = 'FACADE_PRODUCT_SEARCH';
    const FACADE_TOUCH = 'FACADE_TOUCH';
    const FACADE_STOCK = 'FACADE_STOCK';
    const FACADE_TAX = 'FACADE_TAX';
    const FACADE_COUNTRY = 'FACADE_COUNTRY';
    const FACADE_DISCOUNT = 'FACADE_DISCOUNT';
    const FACADE_URL = 'FACADE_URL';
    const FACADE_PRODUCT_OPTION = 'FACADE_PRODUCT_OPTION';

    const QUERY_CONTAINER_CMS = 'QUERY_CONTAINER_CMS';
    const QUERY_CONTAINER_CATEGORY = 'QUERY_CONTAINER_CATEGORY';
    const QUERY_CONTAINER_PRODUCT = 'QUERY_CONTAINER_PRODUCT';
    const QUERY_CONTAINER_PRICE = 'QUERY_CONTAINER_PRICE';
    const QUERY_CONTAINER_SHIPMENT = 'QUERY_CONTAINER_SHIPMENT';
    const QUERY_CONTAINER_TAX = 'QUERY_CONTAINER_TAX';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addProductOptionFacade($container);
        $container = $this->addCmsFacade($container);
        $container = $this->addCategoryFacade($container);
        $container = $this->addLocaleFacade($container);
        $container = $this->addGlossaryFacade($container);
        $container = $this->addProductFacade($container);
        $container = $this->addProductManagementFacade($container);
        $container = $this->addTouchFacade($container);
        $container = $this->addStockFacade($container);
        $container = $this->addTaxFacade($container);
        $container = $this->addProductSearchFacade($container);
        $container = $this->addDiscountFacade($container);
        $container = $this->addUrlFacade($container);
        $container = $this->addCountryFacade($container);
        $container = $this->addCmsQueryContainer($container);
        $container = $this->addProductQueryContainer($container);
        $container = $this->addPriceQueryContainer($container);
        $container = $this->addCategoryQueryContainer($container);
        $container = $this->addShipmentQueryContainer($container);

        $container = $this->addTaxQueryContainer($container);

        $container = $this->addUtilDataReaderService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductOptionFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCmsFacade(Container $container)
    {
        $container[static::FACADE_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryFacade(Container $container)
    {
        $container[static::FACADE_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addLocaleFacade(Container $container)
    {
        $container[static::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addGlossaryFacade(Container $container)
    {
        $container[static::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductManagementFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_MANAGEMENT] = function (Container $container) {
            return $container->getLocator()->productManagement()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addTouchFacade(Container $container)
    {
        $container[static::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStockFacade(Container $container)
    {
        $container[static::FACADE_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addTaxFacade(Container $container)
    {
        $container[static::FACADE_TAX] = function (Container $container) {
            return $container->getLocator()->tax()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductSearchFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addDiscountFacade(Container $container)
    {
        $container[static::FACADE_DISCOUNT] = function (Container $container) {
            return $container->getLocator()->discount()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUrlFacade(Container $container)
    {
        $container[static::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCountryFacade(Container $container)
    {
        $container[static::FACADE_COUNTRY] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCmsQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addShipmentQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipment()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addTaxQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_TAX] = function (Container $container) {
            return $container->getLocator()->tax()->queryContainer();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilDataReaderService(Container $container)
    {
        $container[static::SERVICE_DATA] = function (Container $container) {
            return $container->getLocator()->utilDataReader()->service();
        };

        return $container;
    }

}
