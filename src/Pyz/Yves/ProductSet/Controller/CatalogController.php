<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\ProductSet\ProductSetClientInterface getClient()
 */
class CatalogController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $searchResults = $this
            ->getClient()
            ->search();

        return $this->viewResponse($searchResults);
    }

}
