<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication;

use Pyz\Yves\Application\Communication\Plugin\Pimple;
use Pyz\Yves\Cms\Communication\Plugin\PageResourceCreator;
use Pyz\Yves\Redirect\Communication\Plugin\RedirectResourceCreator;
use Pyz\Yves\Category\Communication\Plugin\CategoryResourceCreator;
use Pyz\Yves\Product\Communication\Plugin\ProductResourceCreator;
use Pyz\Yves\Collector\Communication\Creator\ResourceCreatorInterface;
use Pyz\Yves\Collector\Communication\Mapper\UrlMapper;
use SprykerFeature\Client\Catalog\Service\Model\FacetConfig;
use SprykerFeature\Client\Collector\Service\Matcher\UrlMatcher;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Silex\Application;

class CollectorDependencyContainer extends AbstractCommunicationDependencyContainer
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
