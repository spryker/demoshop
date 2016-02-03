<?php

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
use Spryker\Yves\Kernel\AbstractFactory;
use Silex\Application;

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
     * @return \Pyz\Yves\Collector\Mapper\UrlMapper
     */
    public function createUrlMapper()
    {
        return new UrlMapper(
            $this->createFacetConfig()
        );
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
