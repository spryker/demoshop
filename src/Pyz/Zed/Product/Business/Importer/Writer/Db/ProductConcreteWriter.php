<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Product\Business\Importer\Writer\Db;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Propel\Runtime\Propel;
use Spryker\Zed\Product\Business\Importer\Writer\ProductConcreteWriterInterface;

class ProductConcreteWriter implements ProductConcreteWriterInterface
{

    /**
     * @var \PDOStatement
     */
    protected $productStatement;

    /**
     * @var \PDOStatement
     */
    protected $attributesStatement;

    /**
     * @var \Generated\Shared\Transfer\LocaleTransfer
     */
    protected $localeTransfer;

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     */
    public function __construct(LocaleTransfer $localeTransfer)
    {
        $this->localeTransfer = $localeTransfer;
        $this->createProductStatement();
        $this->createAttributesStatement();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return bool
     */
    public function writeProduct(ProductConcreteTransfer $productConcreteTransfer)
    {
        dump(json_encode($productConcreteTransfer->getAttributes()));
        $this->productStatement->execute(
            [
                ':sku' => $productConcreteTransfer->getSku(),
                ':isActive' => (int)$productConcreteTransfer->getIsActive(),
                ':attributes' => json_encode($productConcreteTransfer->getAttributes()),
                ':productAbstractSku' => $productConcreteTransfer->getProductAbstractSku(),
            ]
        );

        foreach ($productConcreteTransfer->getLocalizedAttributes() as $localizedAttributes) {
            $this->attributesStatement->execute(
                [
                    ':productSku' => $productConcreteTransfer->getSku(),
                    ':name' => $localizedAttributes->getName(),
                    ':attributes' => json_encode($localizedAttributes->getAttributes()),
                    ':fkLocale' => $this->localeTransfer->getIdLocale(),
                ]
            );
        }

        return true;
    }

    /**
     * create the product insert statement
     *
     * @return void
     */
    protected function createProductStatement()
    {
        $connection = Propel::getConnection();
        //The subselect is necessary, cause MySQL does not have the ability to use a join inside an insert
        $this->productStatement = $connection->prepare(
            sprintf(
                'INSERT INTO %1$s
                  (%2$s, %3$s, %4$s , %5$s) VALUES
                  (:sku, :isActive, (SELECT %6$s FROM %7$s WHERE %8$s = :productAbstractSku), :attributes)
                  ON DUPLICATE KEY UPDATE
                      %2$s=VALUES(%2$s),
                      %3$s=VALUES(%3$s),
                      %4$s=VALUES(%4$s),
                      %5$s=VALUES(%5$s);',
                SpyProductTableMap::TABLE_NAME,
                SpyProductTableMap::COL_SKU,
                SpyProductTableMap::COL_IS_ACTIVE,
                SpyProductTableMap::COL_FK_PRODUCT_ABSTRACT,
                SpyProductTableMap::COL_ATTRIBUTES,
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyProductAbstractTableMap::TABLE_NAME,
                SpyProductAbstractTableMap::COL_SKU
            )
        );
    }

    /**
     * Creates the attribute statement
     *
     * @return void
     */
    protected function createAttributesStatement()
    {
        $connection = Propel::getConnection();
        //The subselect is necessary, cause MySQL does not have the ability to use a join inside an insert
        $this->attributesStatement = $connection->prepare(
            sprintf(
                'INSERT INTO %1$s (%2$s, %3$s, %4$s, %5$s) VALUES(
                    (SELECT %6$s FROM %7$s WHERE %8$s = :productSku),
                    :fkLocale,
                    :name,
                    :attributes
                ) ON DUPLICATE KEY UPDATE
                    %2$s=VALUES(%2$s),
                    %3$s=VALUES(%3$s),
                    %4$s=VALUES(%4$s),
                    %5$s=VALUES(%5$s);',
                SpyProductLocalizedAttributesTableMap::TABLE_NAME,
                SpyProductLocalizedAttributesTableMap::COL_FK_PRODUCT,
                SpyProductLocalizedAttributesTableMap::COL_FK_LOCALE,
                SpyProductLocalizedAttributesTableMap::COL_NAME,
                SpyProductLocalizedAttributesTableMap::COL_ATTRIBUTES,
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductTableMap::TABLE_NAME,
                SpyProductTableMap::COL_SKU
            )
        );
    }

}
