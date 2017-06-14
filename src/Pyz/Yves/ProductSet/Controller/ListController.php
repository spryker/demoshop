<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\ProductSet\ProductSetFactory getFactory()
 */
class ListController extends AbstractController
{

    const PARAM_LIMIT = 'limit';
    const PARAM_OFFSET = 'offset';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $limit = $request->query->getInt(static::PARAM_LIMIT);
        $offset = $request->query->get(static::PARAM_OFFSET);

        $searchResults = $this->getFactory()
            ->getProductSetClient()
            ->getProductSetList($limit, $offset);

        return $this->viewResponse($searchResults);
    }

}
