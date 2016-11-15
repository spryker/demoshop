<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\SpecialOffers\Controller;

use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Pyz\Client\SpecialOffers\SpecialOffersClientInterface getClient()
 */
class PersonalizedProductsController extends AbstractController
{

    /**
     * @param int $limit
     *
     * @return array
     */
    public function indexAction($limit)
    {
        $searchResult = $this->getClient()->getPersonalizedProducts($limit);

        return $this->viewResponse($searchResult);
    }

}
