<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Orm\Zed\Product\Persistence\SpyProductAttributesMetadataQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';

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
     * @return bool
     */
    public function canImport()
    {
        return true;
        //return $this->productFacade->getAbstractProductCount() > 0;
    }

    /**
     * @param array $columns
     * @param array $data
     */
    public function importOne(array $columns, array $data)
    {
        $this->installMetadata($data);

        $step = 0;
        $productCollection = SpyProductQuery::create()->find();
        $total = SpyProductQuery::create()->count();

        foreach ($productCollection as $product) {
            $step++;
            $info = 'Importing... '.$step.'/'.$total;
            $data->write($info);
            $data->write(str_repeat("\x08", strlen($info)));

            $this->productSearchFacade
                ->activateProductSearch($product->getIdProduct(), $this->localeManager->getLocaleCollection());
        }

        $data->writeln('');
        $data->writeln('Installed: '.$step);
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return intval($variant) > 1;
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
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function installMetadata(OutputInterface $output)
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
