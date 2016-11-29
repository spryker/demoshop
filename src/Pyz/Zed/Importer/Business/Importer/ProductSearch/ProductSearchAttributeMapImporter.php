<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductSearch;

use Generated\Shared\Search\PageIndexMap;
use Orm\Zed\ProductSearch\Persistence\Base\SpyProductSearchAttributeMapQuery;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchAttributeMapImporter extends AbstractImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'id_product';

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductSearchFacadeInterface $productSearchFacade
    ) {
        parent::__construct($localeFacade);

        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search Attribute Map';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductSearchAttributeMapQuery::create();

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $pageIndexMap = new PageIndexMap();

        $validTargetFields = $pageIndexMap->getProperties();
        if (!in_array($data['target_field'], $validTargetFields)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid target field "%s" for attribute "%s"',
                $data['target_field'],
                $data['attribute_key']
            ));
        }

        $attributeKeyEntity = SpyProductAttributeKeyQuery::create()
            ->filterByKey($data['attribute_key'])
            ->findOneOrCreate();

        if (!$attributeKeyEntity->getIdProductAttributeKey()) {
            $attributeKeyEntity->save();
        }

        $this->addAttributeMapping($attributeKeyEntity->getIdProductAttributeKey(), $data['target_field']);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @param int $idProductAttributeKey
     * @param string $targetField
     *
     * @return void
     */
    protected function addAttributeMapping($idProductAttributeKey, $targetField)
    {
        $spyProductSearchAttributeMapping = SpyProductSearchAttributeMapQuery::create()
            ->filterByFkProductAttributeKey($idProductAttributeKey)
            ->filterByTargetField($targetField)
            ->findOneOrCreate();

        $spyProductSearchAttributeMapping->save();
    }

}
