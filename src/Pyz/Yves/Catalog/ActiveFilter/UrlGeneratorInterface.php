<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\ActiveFilter;

use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Symfony\Component\HttpFoundation\Request;

interface UrlGeneratorInterface
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $searchResultTransfer
     * @param string $filterValue
     *
     * @return string
     */
    public function generateUrlWithoutActiveFilter(Request $request, TransferInterface $searchResultTransfer, $filterValue);

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface[] $facetFilters
     *
     * @return string
     */
    public function generateUrlWithoutAllActiveFilters(Request $request, array $facetFilters);

}
