<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Controller;

use \Spryker\Zed\CustomerGroup\Communication\Controller\AddController as BaseAddController;
use Symfony\Component\HttpFoundation\Request;

class AddController extends BaseAddController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $dataProvider = $this->getFactory()->createCustomerGroupFormDataProvider();

        $form = $this->getFactory()
            ->createCustomerGroupForm(
                $dataProvider->getData(),
                $dataProvider->getOptions()
            )
            ->handleRequest($request);

        if ($form->isValid()) {
            /** @var \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer */
            $customerGroupTransfer = $form->getData();

            $this->getFacade()->add($customerGroupTransfer);

            return $this->redirectResponse('/customer-organization');
        }

        return $this->viewResponse([
            'customerGroupFormTabs' => $this->getFactory()->createCustomerGroupFormTabs()->createView(),
            'form' => $form->createView(),
            'availableCustomerTable' => $this->getFactory()
                ->createAvailableCustomerTable()
                ->render(),
            'assignedCustomerTable' => $this->getFactory()
                ->createAssignedCustomerTable()
                ->render(),
        ]);
    }
}
