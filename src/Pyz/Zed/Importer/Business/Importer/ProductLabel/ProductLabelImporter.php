<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductLabel;

use ArrayObject;
use Generated\Shared\Transfer\ProductLabelLocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductLabelTransfer;
use Orm\Zed\ProductLabel\Persistence\SpyProductLabelQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface;

class ProductLabelImporter extends AbstractImporter
{

    const FIELD_NAME = 'name';
    const FIELD_IS_ACTIVE = 'is_active';
    const FIELD_IS_EXCLUSIVE = 'is_exclusive';
    const FIELD_FRONT_END_REFERENCE = 'front_end_reference';
    const FIELD_VALID_FROM = 'valid_from';
    const FIELD_VALID_TO = 'valid_to';
    const FIELD_ATTRIBUTE_NAME_PREFIX = 'name.';
    const FIELD_PRODUCT_ABSTRACT_SKUS = 'product_abstract_skus';

    /**
     * @var \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface
     */
    protected $productLabelFacade;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var array
     */
    protected $productAbstractSkuToIdMap = [];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface $productLabelFacade
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductLabelFacadeInterface $productLabelFacade,
        ProductFacadeInterface $productFacade
    ) {
        parent::__construct($localeFacade);

        $this->productLabelFacade = $productLabelFacade;
        $this->productFacade = $productFacade;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $productLabelTransfer = $this->importProductLabel($data);
        $this->importAbstractProductRelations($data, $productLabelTransfer);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ProductLabelTransfer
     */
    protected function importProductLabel(array $data)
    {
        $productLabelTransfer = new ProductLabelTransfer();
        $productLabelTransfer->setName($data[static::FIELD_NAME]);
        $productLabelTransfer->setIsActive((int)$data[static::FIELD_IS_ACTIVE]);
        $productLabelTransfer->setIsExclusive((int)$data[static::FIELD_IS_EXCLUSIVE]);
        $productLabelTransfer->setFrontEndReference($data[static::FIELD_FRONT_END_REFERENCE]);
        $productLabelTransfer->setLocalizedAttributesCollection($this->getLocalizedAttributesTransferCollection($data));

        if ($data[static::FIELD_VALID_FROM]) {
            $productLabelTransfer->setValidFrom($data[static::FIELD_VALID_FROM]);
        }

        if ($data[static::FIELD_VALID_TO]) {
            $productLabelTransfer->setValidTo($data[static::FIELD_VALID_TO]);
        }

        $this->productLabelFacade->createLabel($productLabelTransfer);

        return $productLabelTransfer;
    }

    /**
     * @param array $data
     *
     * @return \ArrayObject
     */
    protected function getLocalizedAttributesTransferCollection(array $data)
    {
        $localizedAttributesTransferCollection = new ArrayObject();

        foreach ($this->localeFacade->getLocaleCollection() as $localeTransfer) {
            $attributeNameField = static::FIELD_ATTRIBUTE_NAME_PREFIX . $localeTransfer->getLocaleName();
            if (!array_key_exists($attributeNameField, $data)) {
                continue;
            }

            $localizedAttributesTransfer = new ProductLabelLocalizedAttributesTransfer();
            $localizedAttributesTransfer->setFkLocale($localeTransfer->getIdLocale());
            $localizedAttributesTransfer->setName($data[$attributeNameField]);

            $localizedAttributesTransferCollection->append($localizedAttributesTransfer);
        }

        return $localizedAttributesTransferCollection;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\ProductLabelTransfer $productLabelTransfer
     *
     * @return void
     */
    protected function importAbstractProductRelations(array $data, ProductLabelTransfer $productLabelTransfer)
    {
        $abstractProductSkuList = explode(',', $data[static::FIELD_PRODUCT_ABSTRACT_SKUS]);

        if (!count($abstractProductSkuList)) {
            return;
        }

        $abstractProductIds = [];
        foreach ($abstractProductSkuList as $sku) {
            $idProductAbstract = $this->getAbstractProductIdForSku($sku);

            if (!$idProductAbstract) {
                continue;
            }

            $abstractProductIds[] = $idProductAbstract;
        }

        $this->productLabelFacade->addAbstractProductRelationsForLabel(
            $productLabelTransfer->getIdProductLabel(),
            $abstractProductIds
        );
    }

    /**
     * @param string $sku
     *
     * @return int|null
     */
    protected function getAbstractProductIdForSku($sku)
    {
        if (!array_key_exists($sku, $this->productAbstractSkuToIdMap)) {
            $idProductAbstract = $this->productFacade->findProductAbstractIdBySku($sku);
            $this->productAbstractSkuToIdMap[$sku] = $idProductAbstract;
        }

        return $this->productAbstractSkuToIdMap[$sku];
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductLabelQuery::create();

        return ($query->count() > 0);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Label';
    }

}
