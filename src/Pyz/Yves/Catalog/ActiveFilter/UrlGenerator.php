<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\ActiveFilter;

use Generated\Shared\Transfer\FacetSearchResultTransfer;
use Generated\Shared\Transfer\RangeSearchResultTransfer;
use InvalidArgumentException;
use Spryker\Client\Search\SearchClientInterface;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Symfony\Component\HttpFoundation\Request;

class UrlGenerator implements UrlGeneratorInterface
{

    /**
     * @var \Spryker\Client\Search\SearchClientInterface
     */
    protected $searchClient;

    /**
     * @param \Spryker\Client\Search\SearchClientInterface $searchClient
     */
    public function __construct(SearchClientInterface $searchClient)
    {
        $this->searchClient = $searchClient;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $searchResultTransfer
     * @param string $filterValue
     *
     * @return string
     */
    public function generateUrlWithoutActiveFilter(Request $request, TransferInterface $searchResultTransfer, $filterValue)
    {
        $params = $request->query->all();
        $params = $this->removePaginationFromParams($params);
        $params = $this->processSearchResultTransfer($params, $searchResultTransfer, $filterValue);

        return Url::generate($request->getPathInfo(), $params)->build();
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface[] $facetFilters
     *
     * @return string
     */
    public function generateUrlWithoutAllActiveFilters(Request $request, array $facetFilters)
    {
        $params = $request->query->all();
        $params = $this->removePaginationFromParams($params);

        foreach ($facetFilters as $searchResultTransfer) {
            if (!isset($params[$searchResultTransfer->getConfig()->getName()])) {
                continue;
            }

            $params = $this->processSearchResultTransfer($params, $searchResultTransfer);
        }

        return Url::generate($request->getPathInfo(), $params)->build();
    }

    /**
     * @param array $params
     * @param mixed $searchResultTransfer
     * @param string|null $filterValue
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function processSearchResultTransfer(array $params, $searchResultTransfer, $filterValue = null)
    {
        switch (get_class($searchResultTransfer)) {
            case FacetSearchResultTransfer::class:
                $params = $this->processFacetSearchResultTransfer($params, $searchResultTransfer, $filterValue);
                break;

            case RangeSearchResultTransfer::class:
                $params = $this->processRangeSearchResultTransfer($params, $searchResultTransfer);
                break;

            default:
                throw new InvalidArgumentException(sprintf(
                    'Invalid search result transfer "%s',
                    get_class($searchResultTransfer)
                ));
        }

        return $params;
    }

    /**
     * @param array $params
     * @param \Generated\Shared\Transfer\FacetSearchResultTransfer $searchResultTransfer
     * @param string|null $filterValue
     *
     * @return array
     */
    protected function processFacetSearchResultTransfer(array $params, FacetSearchResultTransfer $searchResultTransfer, $filterValue = null)
    {
        $param = $params[$searchResultTransfer->getName()];
        if (is_array($param) && $filterValue) {
            $i = array_search($filterValue, $param);
            unset($params[$searchResultTransfer->getName()][$i]);

            return $params;
        }

        unset($params[$searchResultTransfer->getName()]);

        return $params;
    }

    /**
     * @param array $params
     * @param \Generated\Shared\Transfer\RangeSearchResultTransfer $searchResultTransfer
     *
     * @return array
     */
    protected function processRangeSearchResultTransfer(array $params, RangeSearchResultTransfer $searchResultTransfer)
    {
        unset($params[$searchResultTransfer->getName()]);

        return $params;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    protected function removePaginationFromParams(array $params)
    {
        $paginationParameterName = $this->searchClient->getSearchConfig()
            ->getPaginationConfigBuilder()
            ->get()
            ->getParameterName();

        if (isset($params[$paginationParameterName])) {
            unset($params[$paginationParameterName]);
        }

        return $params;
    }

}
