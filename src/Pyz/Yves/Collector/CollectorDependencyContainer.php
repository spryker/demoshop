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
use SprykerFeature\Client\Catalog\Service\Model\FacetConfig;
use SprykerFeature\Client\Collector\Service\Matcher\UrlMatcher;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use Silex\Application;

class CollectorDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return ResourceCreatorInterface[]
     */
    public function createResourceCreators()
    {
        return [
            (new ProductResourceCreator())->createProductResourceCreator(),
            (new CategoryResourceCreator())->createCategoryResourceCreator(),
            (new RedirectResourceCreator())->createRedirectResourceCreator(),
            (new PageResourceCreator())->createPageResourceCreator(),
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

}
