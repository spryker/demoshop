<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Transfer\TaxRateTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Orm\Zed\Tax\Persistence\SpyTaxSetQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Tax\Business\TaxFacadeInterface;

class ProductTaxImporter extends AbstractImporter
{

    const SKU = 'sku';
    const VARIANT_ID = 'variant_id';
    const TAX_SET = 'tax_set';

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Tax\Business\TaxFacadeInterface
     */
    protected $taxFacade;

    /**
     * @var \Generated\Shared\Transfer\TaxSetTransfer
     */
    protected $taxSet;

    /**
     * @var \Generated\Shared\Transfer\TaxRateTransfer
     */
    protected $taxRate;

    /**
     * @var string
     */
    protected $dataDirectory;


    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Tax\Business\TaxFacadeInterface $taxFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        TaxFacadeInterface $taxFacade,
        ProductQueryContainerInterface $productQueryContainer,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->taxFacade = $taxFacade;
        $this->productQueryContainer = $productQueryContainer;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Tax Set';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyTaxSetQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @throws \UnexpectedValueException
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $product = $this->format($data);
        $tax = $this->getTaxValue();

        $productAbstract = $this->productQueryContainer
            ->queryProductAbstractBySku($tax[self::SKU])
            ->findOne();

        if (!$productAbstract) {
            return;
        }

        if ($productAbstract->getSku() !== $product[self::SKU]) {
            throw new \UnexpectedValueException(
                sprintf(
                    'Abstract SKU mismatch for product abstract with id: "%d". Product abstract sku: "%s" - tax sku: "%s"',
                    $productAbstract->getIdProductAbstract(),
                    $product[self::SKU],
                    $tax[self::SKU]
                )
            );
        }

        $productAbstract->setFkTaxSet($this->taxRate->getIdTaxRate());
        $productAbstract->save();
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->csvReader = new CsvReader();
        $this->csvReader->load($this->dataDirectory . '/taxes.csv');

        $this->taxRate = $this->createTaxRate();
        $this->taxSet = $this->createTaxSet('DEFAULT', $this->taxRate);

        $this->taxFacade->addTaxRateToTaxSet(
            $this->taxSet->getIdTaxSet(),
            $this->taxRate
        );
    }

    /**
     * @return array
     */
    protected function getTaxValue()
    {
        $default = [
            self::SKU => null,
            self::VARIANT_ID => 1,
            self::TAX_SET => null,
        ];

        if (!$this->csvReader->valid()) {
            return $default;
        }

        return $this->csvReader->read();
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return (int)$variant > 1;
    }

    /**
     * @param string $name
     * @param \Generated\Shared\Transfer\TaxRateTransfer $taxRateTransfer
     *
     * @return \Generated\Shared\Transfer\TaxSetTransfer
     */
    protected function createTaxSet($name, TaxRateTransfer $taxRateTransfer)
    {
        $taxSetTransfer = new TaxSetTransfer();
        $taxSetTransfer->setName($name);
        $taxSetTransfer->setTaxRates(
            new \ArrayObject([$taxRateTransfer])
        );

        return $this->taxFacade->createTaxSet($taxSetTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\TaxRateTransfer
     */
    protected function createTaxRate()
    {
        $taxRateTransfer = new TaxRateTransfer();
        $taxRateTransfer->setName('19%');
        $taxRateTransfer->setRate(19.00);

        return $this->taxFacade->createTaxRate($taxRateTransfer);
    }

}
