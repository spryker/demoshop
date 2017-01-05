<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Application\Business\Routing;

use Pimple;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\CompiledRoute;
use Symfony\Component\Routing\Generator\UrlGenerator as SymfonyUrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class UrlGenerator extends SymfonyUrlGenerator
{

    const HOME = 'home';
    const ERROR_PATH = '/error/404';

    /**
     * @var \Pimple
     */
    protected $app;

    /**
     * @param \Pimple $app
     * @param \Symfony\Component\Routing\RouteCollection $routes
     * @param \Symfony\Component\Routing\RequestContext $context
     * @param \Psr\Log\LoggerInterface|null $logger
     */
    public function __construct(Pimple $app, RouteCollection $routes, RequestContext $context, LoggerInterface $logger = null)
    {
        parent::__construct($routes, $context, $logger);

        $this->app = $app;
    }

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $url = parent::generate($name, $parameters, $referenceType);

        list($url, $queryParams) = $this->stripQueryParams($url);

        $route = $this->routes->get($name);
        $compiledRoute = $route->compile();

        $url = $this->setVariablePath($name, $url, $compiledRoute, $route, $referenceType);
        $url = $this->appendQueryParams($url, $queryParams);

        return $url;
    }

    /**
     * @param string $name
     * @param string $url
     * @param \Symfony\Component\Routing\CompiledRoute $compiledRoute
     * @param \Symfony\Component\Routing\Route $route
     * @param bool $referenceType
     *
     * @return string
     */
    protected function setVariablePath($name, $url, CompiledRoute $compiledRoute, Route $route, $referenceType)
    {
        if ($compiledRoute->getStaticPrefix() === self::ERROR_PATH) {
            return $url;
        }

        $baseHost = '/';
        if ($referenceType === self::ABSOLUTE_URL) {
            $baseHost = $this->context->getScheme() . '://' . $this->context->getHost() . '/';
        }

        if ($name !== self::HOME && $baseHost === $url) {
            $firstPathVariable = current($compiledRoute->getPathVariables());
            $url .= $route->getDefault($firstPathVariable);
        }

        if (!$this->isWebProfilerUrl($url)) {
            $url = $this->setLocalePath($url, $baseHost, $route);
        }

        return $url;
    }

    /**
     * @param string $url
     * @param string $baseHost
     *
     * @return string
     */
    protected function setLocalePath($url, $baseHost, Route $route)
    {
        $prefixLocale = mb_substr($this->context->getParameter('_locale'), 0, 2) . '/';
        $localePath = mb_substr($this->context->getPathInfo(), 1, 3);

        if ($prefixLocale === $localePath) {
            $urlToMatch = preg_replace('/^' . preg_quote($baseHost, '/') . '/', $prefixLocale, $url);
            if (preg_match($route->compile()->getRegex(), '/' . $urlToMatch)) {
                return $baseHost . $urlToMatch;
            }
        }

        return $url;
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    protected function isWebProfilerUrl($url)
    {
        if (isset($this->app['profiler.mount_prefix'])) {
            return preg_match('/^' . preg_quote($this->app['profiler.mount_prefix'], '/') . '/', $url);
        }

        return false;
    }

    /**
     * @param string $url
     *
     * @return array
     */
    protected function stripQueryParams($url)
    {
        $queryParams = parse_url($url, PHP_URL_QUERY);
        $url = strtok($url, '?');

        return [$url, $queryParams];
    }

    /**
     * @param string $url
     * @param string $queryParams
     *
     * @return string
     */
    protected function appendQueryParams($url, $queryParams)
    {
        if ($queryParams) {
            $url .= '?' . $queryParams;
        }

        return $url;
    }

}
