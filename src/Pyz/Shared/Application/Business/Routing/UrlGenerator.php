<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Shared\Application\Business\Routing;

use Symfony\Component\Routing\CompiledRoute;
use Symfony\Component\Routing\Generator\UrlGenerator as SymfonyUrlGenerator;
use Symfony\Component\Routing\Route;

class UrlGenerator extends SymfonyUrlGenerator
{

    const HOME = 'home';
    const ERROR_PATH = '/error/404';

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $url = parent::generate($name, $parameters, $referenceType);

        $route = $this->routes->get($name);
        $compiledRoute = $route->compile();

        return $this->setVariablePath($name, $url, $compiledRoute, $route);
    }

    /**
     * @param string $name
     * @param string $url
     * @param CompiledRoute $compiledRoute
     * @param Route $route
     *
     * @return string
     */
    protected function setVariablePath($name, $url, CompiledRoute $compiledRoute, Route $route)
    {
        if ($compiledRoute->getStaticPrefix() === self::ERROR_PATH) {
            return $url;
        }

        $baseHost = $this->context->getScheme() . '://' . $this->context->getHost() . '/';

        if ($name !== self::HOME && $baseHost === $url) {
            $firstPathVariable = current($compiledRoute->getPathVariables());
            $url .= $route->getDefault($firstPathVariable);
        }
        $url = $this->setLocalePath($url, $baseHost);

        return $url;
    }

    /**
     * @param string $url
     * @param string $baseHost
     *
     * @return string
     */
    protected function setLocalePath($url, $baseHost)
    {
        $prefixLocale = mb_substr($this->context->getParameter('_locale'), 0, 2) . '/';
        $localePath = mb_substr($this->context->getPathInfo(), 1, 3);

        if ($prefixLocale === $localePath) {
            $url = str_replace($baseHost, $baseHost . $prefixLocale, $url);
        }

        return $url;
    }

}
