<?php

namespace Pyz\Zed\Product\Business\Product;

use SprykerFeature\Zed\Product\Business\Product\ProductManagerInterface as SprykerProductManagerInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use SprykerFeature\Zed\Product\Business\Exception\MissingProductException;

interface ProductManagerInterface extends SprykerProductManagerInterface
{
    /**
     * @param $abstractSku
     * @return AbstractProductTransfer
     * @throws MissingProductException
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getAbstractProduct($abstractSku);

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return int
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAbstractProduct(AbstractProductInterface $abstractProductTransfer);

    /**
     * @param ConcreteProductInterface $concreteProductTransfer
     * @return int
     */
    public function saveConcreteProduct(ConcreteProductInterface $concreteProductTransfer);

    /**
     * @param $idConcreteProduct
     * @return ConcreteProductInterface $concreteProductTransfer
     */
    public function getConcreteProductById($idConcreteProduct);

}