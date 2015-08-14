<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication\Plugin\Router;

use Pyz\Yves\Collector\Communication\CollectorDependencyContainer;
use Pyz\Yves\Collector\Communication\Creator\ResourceCreatorInterface;
use Pyz\Yves\Collector\Communication\Mapper\UrlMapperInterface;
use Silex\Application;
use SprykerEngine\Yves\Application\Business\Routing\AbstractRouter;
use SprykerFeature\Client\Collector\Service\Matcher\UrlMatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class StorageRouter extends AbstractRouter
{

    /**
     * @var ResourceCreatorInterface[]
     */
    private $resourceCreators = [];

    /**
     * @var UrlMatcherInterface
     */
    private $urlMatcher;

    /**
     * @var UrlMapperInterface
     */
    private $urlMapper;

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        if ($this->getUrlMatcher()->matchUrl($name, $this->getApplication()['locale'])) {
            $request = $this->getRequest();
            $requestParameters = $request->query->all();
            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            //TODO @see SprykerFeature\Yves\Catalog\Business\Model\AbstractSearch Line 77
            //     same todo to put parameter name into constant
            if (!isset($parameters['page']) && isset($requestParameters['page'])) {
                unset($requestParameters['page']);
            }
            $pathInfo = $this->getUrlMapper()->generateUrlFromParameters(
                $this->getUrlMapper()->mergeParameters($requestParameters, $parameters)
            );
            $pathInfo = $name . $pathInfo;

            return $this->getUrlOrPathForType($pathInfo, $referenceType);
        }
        throw new RouteNotFoundException();
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if ($pathinfo !== '/') {
            $urlDetails = $this->getUrlMatcher()->matchUrl($pathinfo, $this->getApplication()['locale']);
            if ($urlDetails) {
                foreach ($this->getResourceCreators() as $resourceCreator) {
                    if ($urlDetails['type'] === $resourceCreator->getType()) {
                        return $resourceCreator->createResource($this->getApplication(), $urlDetails['data']);
                    }
                }
            }
        }

        throw new ResourceNotFoundException();
    }

    /**
     * @return ResourceCreatorInterface[]
     */
    private function getResourceCreators()
    {
        return $this->getDependencyContainer()->createResourceCreators();
    }

    /**
     * @return UrlMapperInterface
     */
    private function getUrlMapper()
    {
        return $this->getDependencyContainer()->createUrlMapper();
    }

    /**
     * @return UrlMatcherInterface
     */
    private function getUrlMatcher()
    {
        return $this->getDependencyContainer()->createUrlMatcher();
    }

    /**
     * @return Request
     */
    private function getRequest()
    {
        $application = $this->getApplication();
        $request = ($application['request_stack']) ? $application['request_stack']->getCurrentRequest() : $application['request'];

        return $request;
    }

    /**
     * @return Application
     */
    private function getApplication()
    {
        return $this->getDependencyContainer()->createApplication();
    }

}
