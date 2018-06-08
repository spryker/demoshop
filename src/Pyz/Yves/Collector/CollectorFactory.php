<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector;

use Pyz\Yves\Collector\Mapper\ParameterMerger;
use Pyz\Yves\Collector\Mapper\UrlMapper;
use Spryker\Yves\Kernel\AbstractFactory;

class CollectorFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface[]
     */
    public function getResourceCreators()
    {
        return [
            $this->getProductResourceCreatorPlugin(),
            $this->getCategoryResourceCreatorPlugin(),
            $this->getRedirectResourceCreatorPlugin(),
            $this->getPageResourceCreatorPlugin(),
            $this->getProductSetResourceCreatorPlugin(),
        ];
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\UrlMapperInterface
     */
    public function createUrlMapper()
    {
        return new UrlMapper();
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\ParameterMergerInterface
     */
    public function createParameterMerger()
    {
        return new ParameterMerger();
    }

    /**
     * @return \Spryker\Client\Url\UrlClientInterface
     */
    public function getUrlClient()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::CLIENT_URL);
    }

    /**
     * @return \Silex\Application
     */
    public function getApplication()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Pyz\Yves\Product\Plugin\ProductResourcePlugin
     */
    protected function getProductResourceCreatorPlugin()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_PRODUCT_RESOURCE_CREATOR);
    }

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryResourcePlugin
     */
    protected function getCategoryResourceCreatorPlugin()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_CATEGORY_RESOURCE_CREATOR);
    }

    /**
     * @return \Pyz\Yves\Redirect\Plugin\RedirectResourcePlugin
     */
    protected function getRedirectResourceCreatorPlugin()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_REDIRECT_RESOURCE_CREATOR);
    }

    /**
     * @return \Pyz\Yves\Cms\Plugin\PageResourcePlugin
     */
    protected function getPageResourceCreatorPlugin()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_PAGE_RESOURCE_CREATOR);
    }

    /**
     * @return \Pyz\Yves\ProductSet\Plugin\ProductSetResourcePlugin
     */
    protected function getProductSetResourceCreatorPlugin()
    {
        return $this->getProvidedDependency(CollectorDependencyProvider::PLUGIN_PRODUCT_SET_RESOURCE_CREATOR);
    }
}
