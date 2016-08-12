<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Search\PageIndexMap;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Orm\Zed\ProductSearch\Persistence\Base\SpyProductSearchAttributeMapQuery;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchImporter extends AbstractImporter
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
        return 'Product Search';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductSearchQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $this->productSearchFacade
            ->activateProductSearch($data[self::PRODUCT_ID], $this->localeFacade->getLocaleCollection());
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
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @return array
     */
    protected function getMappings()
    {
        /*
         * This is the default configuration for product search attributes (spy_product_search_attribute_mapping table).
         * You can add addition attributes here with the format of: [attribute_name => [target_field_name1, ...], ...].
         */
        return [
            'sku' => [
                PageIndexMap::FULL_TEXT_BOOSTED,
                PageIndexMap::SUGGESTION_TERMS,
                PageIndexMap::COMPLETION_TERMS,
            ],
            'short_description' => [
                PageIndexMap::FULL_TEXT_BOOSTED,
                PageIndexMap::SUGGESTION_TERMS,
                PageIndexMap::COMPLETION_TERMS,
            ],
            'long_description' => [
                PageIndexMap::FULL_TEXT,
                PageIndexMap::SUGGESTION_TERMS,
                PageIndexMap::COMPLETION_TERMS,
            ],
        ];
    }

    /**
     * @param int $idAttribute
     * @param string $copyTarget
     *
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function addOperation($idAttribute, $copyTarget)
    {
        $spyProductSearchAttributeMapping = SpyProductSearchAttributeMapQuery::create()
            ->filterByFkProductAttributeKey($idAttribute)
            ->filterByTargetField($copyTarget)
            ->findOneOrCreate();

        $spyProductSearchAttributeMapping->save();
    }

    /**
     * @return void
     */
    protected function before()
    {
        foreach ($this->getMappings() as $sourceField => $targetFields) {
            foreach ($targetFields as $targetField) {
                $attribute = SpyProductAttributeKeyQuery::create()
                    ->findOneByKey($sourceField);

                if ($attribute) {
                    $idAttributeKey = $attribute->getIdProductAttributeKey();
                    $this->addOperation($idAttributeKey, $targetField);
                }
            }
        }
    }

}
