<?php

namespace Pyz\Zed\Stock\Dependency\Facade;

use Generated\Shared\Transfer\StockProductTransfer;

interface StockToProductInterface
{

    /**
     * @param StockProductTransfer $transferStockProduct
     *
     * @return int
     */
    public function createStockProduct(StockProductTransfer $transferStockProduct);

    /**
     * @param StockProductTransfer $stockProductTransfer
     *
     * @return int
     */
    public function updateStockProduct(StockProductTransfer $stockProductTransfer);

}