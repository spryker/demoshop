<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Stub;

use Exception;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributes;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Propel\Business\Transaction\DatabaseTransactionHandlerTrait;

class ProductManagerStub
{

    use DatabaseTransactionHandlerTrait;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function __construct(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param string $sku
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function createProductAbstractEntity($sku)
    {
        $productAbstractEntity = new SpyProductAbstract();
        $productAbstractEntity->setSku($sku);
        $productAbstractEntity->setAttributes('{}');
        $productAbstractEntity->save();

        return $productAbstractEntity;
    }

    /**
     * @param string $name
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributes
     */
    protected function createLocalizedAttributeEntity($name, $idProductAbstract)
    {
        $localizedAttributeEntity = new SpyProductAbstractLocalizedAttributes();
        $localizedAttributeEntity->setAttributes('{}');
        $localizedAttributeEntity->setFkLocale(66);
        $localizedAttributeEntity->setName($name);
        $localizedAttributeEntity->setFkProductAbstract($idProductAbstract);
        $localizedAttributeEntity->save();

        return $localizedAttributeEntity;
    }

    /**
     * @param string $sku
     * @param string $name
     *
     * @return int
     */
    public function addProductWithoutTransactionHandling($sku, $name)
    {
        $this->productQueryContainer->getConnection()->beginTransaction();

        $productAbstractEntity = $this->createProductAbstractEntity($sku);
        $attributeEntity = $this->createLocalizedAttributeEntity($name, $productAbstractEntity->getIdProductAbstract());

        $this->productQueryContainer->getConnection()->commit();

        return $productAbstractEntity->getIdProductAbstract();
    }

    /**
     * @param string $sku
     * @param string $name
     *
     * @throws \Exception
     *
     * @return void
     */
    public function addProductWithoutTransactionHandlingShouldThrowException($sku, $name)
    {
        $this->productQueryContainer->getConnection()->beginTransaction();

        $productAbstractEntity = new SpyProductAbstract();
        $productAbstractEntity->setSku($sku);
        $productAbstractEntity->setAttributes('{}');
        $productAbstractEntity->save();

        throw new Exception('DB error occured');

        $localizedAttributeEntity = new SpyProductAbstractLocalizedAttributes();
        $localizedAttributeEntity->setAttributes('{}');
        $localizedAttributeEntity->setFkLocale(66);
        $localizedAttributeEntity->setName($name);
        $localizedAttributeEntity->setFkProductAbstract($productAbstractEntity->getIdProductAbstract());
        $localizedAttributeEntity->save();

        $this->productQueryContainer->getConnection()->commit();
    }

    /**
     * @param string $sku
     * @param string $name
     *
     * @throws \Exception
     *
     * @return void
     */
    public function addProductWithTransactionHandlingShouldRollbackAndThrowException($sku, $name)
    {
        $this->handleDatabaseTransaction($this->productQueryContainer->getConnection(), function () use ($sku, $name) {
            $productAbstractEntity = new SpyProductAbstract();
            $productAbstractEntity->setSku($sku);
            $productAbstractEntity->setAttributes('{}');
            $productAbstractEntity->save();

            $localizedAttributeEntity = new SpyProductAbstractLocalizedAttributes();
            $localizedAttributeEntity->setAttributes('{}');
            $localizedAttributeEntity->setFkLocale(66);
            $localizedAttributeEntity->setName($name);
            $localizedAttributeEntity->setFkProductAbstract($productAbstractEntity->getIdProductAbstract());
            $localizedAttributeEntity->save();

            throw new Exception('DB error occured');
        });
    }

}
