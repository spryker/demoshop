<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Pyz\Zed\Installer\Business\Icecat\Importer\AbstractIcecatImporter;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchImporter extends AbstractIcecatImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'id_product';

    /**
     * @var \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected $operationManager;

    /**
     * @var \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface $operationManager
     */
    public function setOperationManager(OperationManagerInterface $operationManager)
    {
        $this->operationManager = $operationManager;
    }

    /**
     * @param \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     */
    public function setProductSearchFacade(ProductSearchFacadeInterface $productSearchFacade)
    {
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
     */
    public function importOne(array $data)
    {
        $this->productSearchFacade
            ->activateProductSearch($data[self::PRODUCT_ID], $this->localeManager->getLocaleCollection());
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
            'description' => [
                'CopyToField' => [
                    'full-text-boosted',
                    'full-text',
                    'suggestion-term',
                    'completion-terms',
                ],
            ],
            'price' => [
                'CopyToFacet' => [
                    'integer-facet',
                ],
                'CopyToMultiField' => [
                    'integer-sort',
                ],
            ],
            'depth' => [
                'CopyToFacet' => [
                    'float-facet',
                ],
            ],
            'width' => [
                'CopyToFacet' => [
                    'float-facet',
                ],
            ],
            'height' => [
                'CopyToFacet' => [
                    'float-facet',
                ],
            ],
            'main_color' => [
                'CopyToField' => [
                    'full-text',
                    'full-text-boosted',
                    'completion-terms',
                    'suggestion-term',
                ],
                'CopyToFacet' => [
                    'string-facet',
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
