<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace Pyz\Yves\Product\Builder;

use Generated\Shared\Transfer\StorageProductTransfer;

interface AttributeVariantBuilderInterface
{

    /**
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return StorageProductTransfer
     */
    public function setSuperAttributes(StorageProductTransfer $storageProductTransfer);

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return StorageProductTransfer
     */
    public function setSelectedVariants(array $selectedAttributes, StorageProductTransfer $storageProductTransfer);
}
