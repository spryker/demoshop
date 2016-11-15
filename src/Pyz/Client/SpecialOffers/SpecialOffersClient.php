<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SpecialOffers;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\SpecialOffers\SpecialOffersFactory getFactory()
 */
class SpecialOffersClient extends AbstractClient implements SpecialOffersClientInterface
{

    /**
     * @param int $limit
     *
     * @return array
     */
    public function getPersonalizedProducts($limit)
    {
        $searchQuery = $this
            ->getFactory()
            ->createPersonalizedProductsQueryPlugin($limit);

        $resultFormatters = $this
            ->getFactory()
            ->createFeaturedProductsResultFormatters();

        return $this
            ->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters);
    }

}
