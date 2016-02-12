<?php

namespace Pyz\Yves\Collector\Plugin\Router;

use Spryker\Yves\Application\Routing\AbstractRouter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @method \Pyz\Yves\Collector\CollectorFactory getFactory()
 */
class StorageRouter extends AbstractRouter
{

    /**
     * @var \Pyz\Yves\Collector\Creator\ResourceCreatorInterface[]
     */
    private $resourceCreators = [];

    /**
     * @var \Spryker\Client\Collector\Matcher\UrlMatcherInterface
     */
    private $urlMatcher;

    /**
     * @var \Pyz\Yves\Collector\Mapper\UrlMapperInterface
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
            //TODO @see Spryker\Yves\Catalog\Business\Model\AbstractSearch Line 77
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
        $defaultLocalePrefix = '/' . mb_substr($this->getApplication()['locale'], 0, 2);

        if ($defaultLocalePrefix === $pathinfo || $defaultLocalePrefix . '/' === $pathinfo) {
            throw new ResourceNotFoundException();
        }

        if ($pathinfo !== '/') {
            $urlDetails = $this->getUrlMatcher()->matchUrl($pathinfo, $this->getApplication()['locale']);

            if ($urlDetails === false) {
                $urlDetails = $this->getUrlMatcher()->matchUrl($defaultLocalePrefix . $pathinfo, $this->getApplication()['locale']);
            }

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
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface[]
     */
    private function getResourceCreators()
    {
        return $this->getFactory()->createResourceCreators();
    }

    /**
     * @return \Pyz\Yves\Collector\Mapper\UrlMapperInterface
     */
    private function getUrlMapper()
    {
        return $this->getFactory()->createUrlMapper();
    }

    /**
     * @return \Spryker\Client\Collector\Matcher\UrlMatcherInterface
     */
    private function getUrlMatcher()
    {
        return $this->getFactory()->createUrlMatcher();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    private function getRequest()
    {
        $application = $this->getApplication();
        $request = ($application['request_stack']) ? $application['request_stack']->getCurrentRequest() : $application['request'];

        return $request;
    }

    /**
     * @return \Silex\Application
     */
    private function getApplication()
    {
        return $this->getFactory()->createApplication();
    }

}
