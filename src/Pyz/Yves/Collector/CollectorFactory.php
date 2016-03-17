<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Category\Plugin\CategoryResourceCreator;
use Pyz\Yves\Cms\Plugin\PageResourceCreator;
use Pyz\Yves\Collector\Mapper\ParameterMerger;
use Pyz\Yves\Collector\Mapper\RequestParameterInjector;
use Pyz\Yves\Collector\Mapper\UrlMapper;
use Pyz\Yves\Product\Plugin\ProductResourceCreator;
use Pyz\Yves\Redirect\Plugin\RedirectResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

class CollectorFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface[]
     */
    public function createResourceCreators()
    {
        return [
            $this->createProductResourceCreator(),
            $this->createCategoryResourceCreator(),
            $this->createRedirectResourceCreator(),
            $this->createPageResourceCreator(),
        ];
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\UrlMapperInterface
     */
    public function createUrlMapper()
    {
        return new UrlMapper($this->createFacetConfig());
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\ParameterMergerInterface
     */
    public function createParameterMerger()
    {
        return new ParameterMerger($this->createFacetConfig());
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\RequestParameterInjectorInterface
     */
    public function createRequestParameterInjector()
    {
        return new RequestParameterInjector($this->createFacetConfig());
    }

    /**
     * @return \Spryker\Client\Collector\Matcher\UrlMatcher
     */
    public function createUrlMatcher()
    {
        $urlMatcher = $this->getLocator()->collector()->client();

        return $urlMatcher;
    }

    /**
     * @return \Spryker\Client\Catalog\Model\FacetConfig
     */
    protected function createFacetConfig()
    {
        return $this->getLocator()->catalog()->client()->createFacetConfig();
    }

    /**
     * @return \Silex\Application
     */
    public function createApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return \Pyz\Yves\Product\Plugin\ProductResourceCreator
     */
    protected function createProductResourceCreator()
    {
        return (new ProductResourceCreator())->createProductResourceCreator();
    }

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryResourceCreator
     */
    protected function createCategoryResourceCreator()
    {
        return (new CategoryResourceCreator())->createCategoryResourceCreator();
    }

    /**
     * @return \Pyz\Yves\Redirect\Plugin\RedirectResourceCreator
     */
    protected function createRedirectResourceCreator()
    {
        return (new RedirectResourceCreator())->createRedirectResourceCreator();
    }

    /**
     * @return \Pyz\Yves\Cms\Plugin\PageResourceCreator
     */
    protected function createPageResourceCreator()
    {
        return (new PageResourceCreator())->createPageResourceCreator();
    }

}
