<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Client\ProductCustomerPermission\ProductCustomerPermissionClientInterface;

class StorageProductCustomerPermissionMapper implements StorageProductCustomerPermissionMapperInterface
{
    /**
     * @var \Spryker\Client\ProductCustomerPermission\ProductCustomerPermissionClientInterface
     */
    protected $productCustomerPermissionClient;

    /**
     * @param \Spryker\Client\ProductCustomerPermission\ProductCustomerPermissionClientInterface $productCustomerPermissionClient
     */
    public function __construct(ProductCustomerPermissionClientInterface $productCustomerPermissionClient)
    {
        $this->productCustomerPermissionClient = $productCustomerPermissionClient;
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapPermissions(StorageProductTransfer $storageProductTransfer)
    {
        $isAllowed = $this->productCustomerPermissionClient
            ->isAllowedForCurrentCustomer($storageProductTransfer->getIdProductConcrete());
        $storageProductTransfer->setAllowedForCustomer($isAllowed);

        return $storageProductTransfer;
    }
}
