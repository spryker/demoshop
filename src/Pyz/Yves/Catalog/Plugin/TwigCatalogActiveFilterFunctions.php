<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_SimpleFunction;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 */
class TwigCatalogActiveFilterFunctions extends AbstractPlugin implements TwigFunctionPluginInterface
{

    const FUNCTION_GET_URL_WITHOUT_ACTIVE_FILTER = 'generateUrlWithoutActiveFilter';
    const FUNCTION_GET_URL_WITHOUT_ALL_ACTIVE_FILTERS = 'generateUrlWithoutAllActiveFilters';

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new Twig_SimpleFunction(self::FUNCTION_GET_URL_WITHOUT_ACTIVE_FILTER, [$this, self::FUNCTION_GET_URL_WITHOUT_ACTIVE_FILTER], [
                'needs_context' => true,
                'is_safe' => ['html'],
            ]),
            new Twig_SimpleFunction(self::FUNCTION_GET_URL_WITHOUT_ALL_ACTIVE_FILTERS, [$this, self::FUNCTION_GET_URL_WITHOUT_ALL_ACTIVE_FILTERS], [
                'needs_context' => true,
                'is_safe' => ['html'],
            ]),
        ];
    }

    /**
     * @param array $context
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $searchResultTransfer
     * @param string $filterValue
     *
     * @return string
     */
    public function generateUrlWithoutActiveFilter(array $context, TransferInterface $searchResultTransfer, $filterValue)
    {
        $request = $this->getRequestFromContext($context);

        return $this->getFactory()
            ->createActiveFilterUrlGenerator()
            ->generateUrlWithoutActiveFilter($request, $searchResultTransfer, $filterValue);
    }

    /**
     * @param array $context
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface[] $facetFilters
     *
     * @return string
     */
    public function generateUrlWithoutAllActiveFilters($context, array $facetFilters)
    {
        $request = $this->getRequestFromContext($context);

        return $this->getFactory()
            ->createActiveFilterUrlGenerator()
            ->generateUrlWithoutAllActiveFilters($request, $facetFilters);
    }

    /**
     * @param array $context
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequestFromContext(array $context)
    {
        return $context['app']['request'];
    }

}
