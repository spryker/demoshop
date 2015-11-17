<?php

namespace Pyz\Zed\ProductSearch\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use SprykerFeature\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;
use Orm\Zed\ProductSearch\Persistence\SpySearchableProductsQuery;
use Propel\Runtime\Exception\PropelException;

class ProductAttributeMappingInstall extends AbstractInstaller
{

    /**
     * @var OperationManagerInterface
     */
    protected $operationManager;

    /**
     * @var ProductSearchToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var ProductSearchToTouchInterface
     */
    protected $touchFacade;

    /**
     * @param OperationManagerInterface $operationManager
     * @param ProductSearchToLocaleInterface $localeFacade
     * @param ProductSearchToTouchInterface $touchFacade
     */
    public function __construct(
        OperationManagerInterface $operationManager,
        ProductSearchToLocaleInterface $localeFacade,
        ProductSearchToTouchInterface $touchFacade
    ) {
        $this->operationManager = $operationManager;
        $this->localeFacade = $localeFacade;
        $this->touchFacade = $touchFacade;
    }

    public function install()
    {
        $this->info(
            'Map installed product attributes to search attributes and will make products exportable for the search'
        );
        $this->installAttributeOperations();
        $this->makeProductsSearchable();

    }
    protected function installAttributeOperations()
    {
        foreach ($this->getMappings() as $sourceField => $operations) {
            $weight = 0;
            foreach ($operations as $operation => $targetFields) {
                foreach ($targetFields as $targetField) {
                    $attribute = SpyProductAttributesMetadataQuery::create()
                        ->findOneByKey($sourceField);
                    if ($attribute) {
                        $weight++;
                        $idAttribute = $attribute->getIdAttributesMetadata();
                        $this->addOperation($idAttribute, $targetField, $operation, $weight);
                    }
                }
            }
        }
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
     * @throws PropelException
     */
    protected function addOperation($idAttribute, $copyTarget, $operation, $weight)
    {
        if (!$this->operationManager->hasAttributeOperation($idAttribute, $copyTarget)) {
            $this->operationManager->createAttributeOperation($idAttribute, $copyTarget, $operation, $weight);
        }
    }

    protected function makeProductsSearchable()
    {
        $idLocale = $this->localeFacade->getCurrentLocale()->getIdLocale();
        $products = SpyProductQuery::create()->find();

        /** @var SpyProduct $product */
        //TODO move this to product search facade
        foreach ($products as $product) {
            $searchableProduct = SpySearchableProductsQuery::create()
                ->filterByFkProduct($product->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $searchableProduct->setIsSearchable(true);
            $searchableProduct->save();

            $this->touchFacade->touchActive('searchableProduct', $product->getIdProduct());
        }
    }

}
