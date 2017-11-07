<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization;

use Pyz\Zed\CustomerOrganization\Dependency\QueryContainer\CustomerOrganizationToCustomerQueryContainerBridge;
use Pyz\Zed\CustomerOrganization\Dependency\Service\CustomerOrganizationToUtilEncodingBridge;
use Spryker\Zed\Kernel\Container;
use \Spryker\Zed\CustomerGroup\CustomerGroupDependencyProvider as BaseCustomerGroupDependencyProvider;

class CustomerOrganizationDependencyProvider extends BaseCustomerGroupDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCustomerQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_CUSTOMER] = function (Container $container) {
            return new CustomerOrganizationToCustomerQueryContainerBridge(
                $container->getLocator()->customer()->queryContainer()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilEncodingService(Container $container)
    {
        $container[static::SERVICE_UTIL_ENCODING] = function (Container $container) {
            return new CustomerOrganizationToUtilEncodingBridge($container->getLocator()->utilEncoding()->service());
        };

        return $container;
    }
}
