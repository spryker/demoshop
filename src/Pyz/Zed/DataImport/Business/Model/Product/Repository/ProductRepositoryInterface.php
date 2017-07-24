<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Product\Repository;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductAbstract;

interface ProductRepositoryInterface
{

    /**
     * @param string $sku
     *
     * @return int
     */
    public function getIdProductByConcreteSku($sku);

    /**
     * @param string $sku
     *
     * @return int
     */
    public function getAbstractSkuByConcreteSku($sku);

    /**
     * @param string $sku
     *
     * @return int
     */
    public function getIdProductAbstractByAbstractSku($sku);

    /**
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @return void
     */
    public function addProductAbstract(SpyProductAbstract $productAbstractEntity);

    /**
     * @param \Orm\Zed\Product\Persistence\SpyProduct $productEntity
     * @param string|null $abstractSku
     *
     * @return void
     */
    public function addProductConcrete(SpyProduct $productEntity, $abstractSku = null);

}
