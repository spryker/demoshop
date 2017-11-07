<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Controller;

use \Spryker\Zed\CustomerGroup\Communication\Controller\EditController as BaseEditController;
use Symfony\Component\HttpFoundation\Request;

class EditController extends BaseEditController
{
    const PARAM_ID_CUSTOMER_GROUP = 'id-customer-organization';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idCustomerGroup = $this->castId($request->query->get(static::PARAM_ID_CUSTOMER_GROUP));

        $dataProvider = $this->getFactory()->createCustomerGroupFormDataProvider();
        $form = $this->getFactory()
            ->createCustomerGroupForm(
                $dataProvider->getData($idCustomerGroup),
                $dataProvider->getOptions($idCustomerGroup)
            )
            ->handleRequest($request);

        if ($form->isValid()) {
            /** @var \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer */
            $customerGroupTransfer = $form->getData();

            $this->getFacade()->update($customerGroupTransfer);

            return $this->redirectResponse(
                sprintf('/customer-organization/view?%s=%d', static::PARAM_ID_CUSTOMER_GROUP, $idCustomerGroup)
            );
        }

        return $this->viewResponse([
            'form' => $form->createView(),
            'idCustomerGroup' => $idCustomerGroup,
            'customerGroupFormTabs' => $this->getFactory()->createCustomerGroupFormTabs()->createView(),
            'availableCustomerTable' => $this->getFactory()
                ->createAvailableCustomerTable($idCustomerGroup)
                ->render(),
            'assignedCustomerTable' => $this->getFactory()
                ->createAssignedCustomerTable($idCustomerGroup)
                ->render(),
        ]);
    }
}
