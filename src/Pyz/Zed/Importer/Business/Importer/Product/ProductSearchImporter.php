<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Search\PageIndexMap;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;

class ProductSearchImporter extends AbstractImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'id_product';

    /**
     * @var \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected $operationManager;

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface $operationManager
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductSearchFacadeInterface $productSearchFacade,
        OperationManagerInterface $operationManager
    ) {
        parent::__construct($localeFacade);

        $this->productSearchFacade = $productSearchFacade;
        $this->operationManager = $operationManager;
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
        return [
            'sku' => [
                'CopyToField' => [
                    PageIndexMap::FULL_TEXT_BOOSTED,
                    PageIndexMap::FULL_TEXT,
                    PageIndexMap::SUGGESTION_TERMS,
                    PageIndexMap::COMPLETION_TERMS,
                ],
            ],
            'short_description' => [
                'CopyToField' => [
                    PageIndexMap::FULL_TEXT_BOOSTED,
                    PageIndexMap::FULL_TEXT,
                    PageIndexMap::SUGGESTION_TERMS,
                    PageIndexMap::COMPLETION_TERMS,
                ],
            ],
            'long_description' => [
                'CopyToField' => [
                    PageIndexMap::FULL_TEXT,
                    PageIndexMap::SUGGESTION_TERMS,
                    PageIndexMap::COMPLETION_TERMS,
                ],
            ],
        ];
    }

    /**
     * @param int $idAttribute
     * @param string $copyTarget
     * @param string $operation
     * @param int $weight
     *
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function addOperation($idAttribute, $copyTarget, $operation, $weight)
    {
        if (!$this->operationManager->hasAttributeOperation($idAttribute, $copyTarget)) {
            $this->operationManager->createAttributeOperation($idAttribute, $copyTarget, $operation, $weight);
        }
    }

    /**
     * @return void
     */
    protected function before()
    {
        foreach ($this->getMappings() as $sourceField => $operations) {
            $weight = 0;
            foreach ($operations as $operation => $targetFields) {
                foreach ($targetFields as $targetField) {
                    $attribute = SpyProductAttributesMetadataQuery::create()
                        ->findOneByKey($sourceField);

                    if ($attribute) {
                        ++$weight;
                        $idAttribute = $attribute->getIdProductAttributesMetadata();
                        $this->addOperation($idAttribute, $targetField, $operation, $weight);
                    }
                }
            }
        }
    }

}
