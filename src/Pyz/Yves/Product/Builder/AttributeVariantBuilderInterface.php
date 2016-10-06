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
     * @param int $idProductAbstract
     *
     * @return array
     */
    public function getSelectedVariantNode(array $selectedAttributes, $idProductAbstract);

    /**
     * @param array $selectedVariantNode
     *
     * @return bool
     */
    public function isProductConcreteNodeReached(array $selectedVariantNode);

    /**
     * @param int $idProductConcrete
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mergeAbstractAndConcreteProducts(
        $idProductConcrete,
        StorageProductTransfer $storageProductTransfer
    );

    /**
     * @param array $selectedVariantNode
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return StorageProductTransfer
     */
    public function setAvailableAttributes(array $selectedVariantNode, StorageProductTransfer $storageProductTransfer);

    /**
     * @param array $selectedVariantNode
     *
     * @return int
     */
    public function extractIdOfProductConcrete(array $selectedVariantNode);

}
