<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SpecialOffers;

interface SpecialOffersClientInterface
{

    /**
     * @param int $limit
     *
     * @return array
     */
    public function getPersonalizedProducts($limit);

}
