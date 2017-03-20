<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Exception;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\Tax\Persistence\SpyTaxSetQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;

class ProductTaxImporter extends AbstractImporter
{

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var array
     */
    protected static $taxSets;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        TouchFacadeInterface $touchFacade,
        ProductQueryContainerInterface $productQueryContainer
    ) {
        parent::__construct($localeFacade);

        $this->touchFacade = $touchFacade;
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Tax';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductAbstractQuery::create()
            ->filterByFkTaxSet(null, Criteria::ISNOTNULL);

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $abstractSku = $data['abstract_sku'];
        $productAbstractEntity = $this->getProductAbstractEntityBySku($abstractSku);

        $taxSetName = $data['tax_set_name'];
        if (!$taxSetName) {
            return;
        }
        $fkTaxSet = $this->getTaxSetId($data['tax_set_name']);

        $productAbstractEntity
            ->setFkTaxSet($fkTaxSet)
            ->save();

        $this->touchProductActive($productAbstractEntity->getIdProductAbstract());
    }

    /**
     * @param string $abstractSku
     *
     * @throws \Exception
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function getProductAbstractEntityBySku($abstractSku)
    {
        $productAbstractEntity = $this->productQueryContainer
            ->queryProductAbstractBySku($abstractSku)
            ->findOne();

        if (!$productAbstractEntity) {
            throw new Exception(sprintf('Missing product abstract with sku "%s"', $abstractSku));
        }

        return $productAbstractEntity;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function touchProductActive($idProductAbstract)
    {
        $this->touchFacade->touchActive(
            ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT,
            $idProductAbstract
        );
    }

    /**
     * @param string $taxSetName
     *
     * @return int
     */
    protected function getTaxSetId($taxSetName)
    {
        if (static::$taxSets === null) {
            static::$taxSets = $this->loadTaxSetsByName();
        }

        return static::$taxSets[$taxSetName];
    }

    /**
     * @return array
     */
    protected function loadTaxSetsByName()
    {
        $result = [];
        $taxSetEntities = SpyTaxSetQuery::create()->find();

        foreach ($taxSetEntities as $taxSetEntity) {
            $result[$taxSetEntity->getName()] = $taxSetEntity->getIdTaxSet();
        }

        return $result;
    }

}
