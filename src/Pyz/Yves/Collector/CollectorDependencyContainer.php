<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Cms\Plugin\PageResourceCreator;
use Pyz\Yves\Redirect\Plugin\RedirectResourceCreator;
use Pyz\Yves\Category\Plugin\CategoryResourceCreator;
use Pyz\Yves\Product\Plugin\ProductResourceCreator;
use Pyz\Yves\Collector\Creator\ResourceCreatorInterface;
use Pyz\Yves\Collector\Mapper\UrlMapper;
use Spryker\Client\Catalog\Model\FacetConfig;
use Spryker\Client\Collector\Matcher\UrlMatcher;
use Spryker\Yves\Kernel\AbstractDependencyContainer;
use Silex\Application;

class CollectorDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return ResourceCreatorInterface[]
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
     * @return UrlMapper
     */
    public function createUrlMapper()
    {
        return new UrlMapper(
            $this->createFacetConfig()
        );
    }

    /**
     * @return UrlMatcher
     */
    public function createUrlMatcher()
    {
        $urlMatcher = $this->getLocator()->collector()->client();

        return $urlMatcher;
    }

    /**
     * @return FacetConfig
     */
    protected function createFacetConfig()
    {
        return $this->getLocator()->catalog()->client()->createFacetConfig();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return ProductResourceCreator
     */
    protected function createProductResourceCreator()
    {
        return (new ProductResourceCreator())->createProductResourceCreator();
    }

    /**
     * @return CategoryResourceCreator
     */
    protected function createCategoryResourceCreator()
    {
        return (new CategoryResourceCreator())->createCategoryResourceCreator();
    }

    /**
     * @return RedirectResourceCreator
     */
    protected function createRedirectResourceCreator()
    {
        return (new RedirectResourceCreator())->createRedirectResourceCreator();
    }

    /**
     * @return PageResourceCreator
     */
    protected function createPageResourceCreator()
    {
        return (new PageResourceCreator())->createPageResourceCreator();
    }

}
