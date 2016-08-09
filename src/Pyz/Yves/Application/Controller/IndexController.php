<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Controller;

use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
class IndexController extends AbstractController
{

    const FEATURED_PRODUCT_LIMIT = 6;

    /**
     * @return array
     */
    public function indexAction()
    {
        $searchResult = $this->getFactory()
            ->getCatalogClient()
            ->getFeaturedProducts(self::FEATURED_PRODUCT_LIMIT);

        return $this->viewResponse($searchResult);
    }

}
