<?php

namespace Pyz\Zed\ProductSearch\Business\Internal\DemoData;

use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataPluginInstaller;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;

class ProductAttributeMappingInstall extends AbstractDemoDataPluginInstaller
{

    /**
     * @var \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected $operationManager;

    /**
     * @var \Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var \Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface
     */
    protected $touchFacade;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface $operationManager
     * @param \Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface $localeFacade
     * @param \Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface $touchFacade
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

    /**
     * @return void
     */
    public function install()
    {
        $this->info(
            'Map installed product attributes to search attributes and will make products exportable for the search'
        );

        $this->installAttributeOperations();
        $this->makeProductsSearchable();
    }

    /**
     * @return void
     */
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
                        $idAttribute = $attribute->getIdProductAttributesMetadata();
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
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    protected function makeProductsSearchable()
    {
        $idLocale = $this->localeFacade->getCurrentLocale()->getIdLocale();
        $products = SpyProductQuery::create()->find();

        /** @var SpyProduct $product */
        //TODO move this to product search facade
        foreach ($products as $product) {
            $searchableProduct = SpyProductSearchQuery::create()
                ->filterByFkProduct($product->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $searchableProduct->setIsSearchable(true);
            $searchableProduct->save();

            $this->touchFacade->touchActive('searchableProduct', $product->getIdProduct());
        }
    }

}
