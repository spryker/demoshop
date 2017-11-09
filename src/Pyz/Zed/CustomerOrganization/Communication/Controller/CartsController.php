<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


/**
 * @method \Pyz\Zed\CustomerOrganization\Business\CustomerOrganizationFacade getFacade()
 * @method \Pyz\Zed\CustomerOrganization\Communication\CustomerOrganizationCommunicationFactory getFactory()
 */
class CartsController extends AbstractController
{

    public function indexAction(Request $request)
    {
        $table = $this->getFactory()
            ->createCustomerGroupTable();

        return $this->viewResponse([
            'customerGroupTable' => $table->render(),
        ]);
    }

}
