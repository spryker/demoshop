<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Stock\Business\StockFacade;

class StockInstaller extends AbstractInstaller
{
    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    /**
     * @var AutoCompletion
     */
    protected $locator;

    /**
     * @var StockFacade
     */
    protected $stockFacade;

    /**
     * @var array
     */
    protected $rawProductData;

    /**
     * @param Locator|AutoCompletion $locator
     * @param array $rawProductData
     */
    public function __construct(
        Locator $locator,
        $rawProductData
    )
    {
        $this->locator = $locator;
        $this->stockFacade = $locator->stock()->facade();
        $this->rawProductData = $rawProductData;
    }

    public function install()
    {
        $this->info('This will install a dummy set of stocks in the demo shop');
        $this->writeStockProduct();
    }

    /**
     * @param array $demoStock
     */
    protected function writeStockProduct()
    {
        foreach ($this->rawProductData as $rawProduct) {
            $this->addEntry($rawProduct);
        }
    }

    /**
     * @param array $product
     */
    protected function addEntry(array $product)
    {
        $stockType = $this->stockFacade->createStockType('Warehouse');
        $transferStockProduct = $this->locator->stock()->transferStockProduct();
        $transferStockProduct->setSku($product[self::SKU])
            ->setIsNeverOutOfStock(false)
            ->setQuantity(10)
            ->setStockType($stockType->getName());

        $hasProduct = $this->stockFacade->hasStockProduct(
            $transferStockProduct->getSku(),
            $transferStockProduct->getStockType()
        );

        if ($hasProduct) {
            $idStockProduct = $this->stockFacade->getIdStockProduct(
                $transferStockProduct->getSku(),
                $transferStockProduct->getStockType()
            );
            $transferStockProduct->setIdStockProduct($idStockProduct);
            $this->stockFacade->setStockProduct($transferStockProduct);
        } else {
            $this->stockFacade->createStockProduct($transferStockProduct);
        }
    }
}
