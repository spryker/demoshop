<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSet;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\ProductSet\ProductSetFactory getFactory()
 */
class ProductSetClient extends AbstractClient implements ProductSetClientInterface
{

    /**
     * @return array
     */
    public function search()
    {
        $searchQuery = $this->getFactory()
            ->createProductSetSearchQuery();

        $resultFormatters = $this
            ->getFactory()
            ->createProductSetSearchResultFormatters();

        return $this
            ->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters);
    }

}
