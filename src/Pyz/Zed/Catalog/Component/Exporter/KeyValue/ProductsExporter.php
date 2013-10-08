<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Zed\Catalog\Component\Exporter\ProductsExporter as CoreProductsExporter;
use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;
use ProjectA\Zed\Yves\Component\Model\Export\AbstractExport;
use Pyz\Shared\Catalog\Code\ProductAttributeConstant;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

abstract class ProductsExporter extends CoreProductsExporter implements
    \ProjectA_Zed_Yves_Component_Interface_Exporter_KeyValue,
    ProductAttributeConstant,
    ProductAttributeSetConstant,
    \Pyz_Shared_Library_StorageKeyConstant,
    \ProjectA_Zed_Yves_Component_Dependency_Facade_Interface
{

    use \ProjectA_Zed_Yves_Component_Dependency_Facade_Trait;

    /**
     * @return string
     */
    abstract protected function getProductAttributeSetName();

    /**
     * @return AbstractProduct
     */
    abstract protected function getProductQueryBuilder();

    /**
     * @param array $product
     * @return array
     */
    protected function transformProductToData($product)
    {
        $product['id'] = $product['id_catalog_product'];
        $product['price'] = $product['final_gross_price'];
        unset($product['id_catalog_product']);
        return $product;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Products ' . $this->getProductAttributeSetName();
    }

    /**
     * @return \ProjectA_Zed_Yves_Component_Exporter_Setup_Entity
     */
    public function getExportSetup()
    {
        $task = $this->facadeYves->getExporterSetupRaw();
        $task->setLazyCollection(
            new \ProjectA_Zed_Library_Propel_RawLazyCollection($this->getProductQueryBuilder())
        );
        return $task;
    }

    /**
     * @param \Traversable $collection
     * @param AbstractExport $exportModel
     * @param \ArrayIterator $reporter
     */
    public function exportData(
        \Traversable $collection,
        AbstractExport $exportModel,
        \ArrayIterator $reporter
    ) {
        $reportName = $this->getName() . ' exported';
        $reporter[$reportName] = 0;

        $allData = array();
        $counter = 0;
        $chunkSize = 2000;
        foreach ($collection as $product) {
            $data = array();
            $pairProductData = $this->transformProductToData($product);

            $productKey = StorageKeyGenerator::getProductKey($product['id_catalog_product']);
            $data[$productKey] = $pairProductData;

            $allData += $data;

            if ($counter % $chunkSize == 0) {
                $exportModel->write($allData);
                $allData = array();
            }

            $counter++;
        }

        //export the rest in allData
        if (!empty($allData)) {
            $exportModel->write($allData);
            unset($allData);
        }

        $reporter[$reportName] = $counter;
    }
}
