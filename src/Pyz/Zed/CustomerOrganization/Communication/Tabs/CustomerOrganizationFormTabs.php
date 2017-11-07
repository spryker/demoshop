<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Tabs;

use Generated\Shared\Transfer\TabItemTransfer;
use Generated\Shared\Transfer\TabsViewTransfer;
use \Spryker\Zed\CustomerGroup\Communication\Tabs\CustomerGroupFormTabs as BaseCustomerGroupFormTabs;

class CustomerOrganizationFormTabs extends BaseCustomerGroupFormTabs
{
    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return $this
     */
    protected function addGeneralInformationTab(TabsViewTransfer $tabsViewTransfer)
    {
        $tabItemTransfer = new TabItemTransfer();
        $tabItemTransfer
            ->setName('general')
            ->setTitle('General Information')
            ->setTemplate('@CustomerOrganization/_partials/general-information.twig');

        $tabsViewTransfer->addTab($tabItemTransfer);

        return $this;
    }

    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return $this
     */
    protected function addCustomerAssignmentTab(TabsViewTransfer $tabsViewTransfer)
    {
        $tabItemTransfer = new TabItemTransfer();
        $tabItemTransfer
            ->setName('customer-assignment')
            ->setTitle('Customers')
            ->setTemplate('@CustomerOrganization/_partials/customer-assignment.twig');

        $tabsViewTransfer->addTab($tabItemTransfer);

        return $this;
    }

    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return $this
     */
    protected function setFooter(TabsViewTransfer $tabsViewTransfer)
    {
        $tabsViewTransfer->setFooterTemplate('@CustomerOrganization/_partials/_submit_button.twig');

        return $this;
    }
}
