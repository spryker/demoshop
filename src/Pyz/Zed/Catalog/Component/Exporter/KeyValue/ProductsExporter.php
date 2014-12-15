<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

use Generated\Zed\Yves\Component\Dependency\YvesFacadeInterface;
use Generated\Zed\Yves\Component\Dependency\YvesFacadeTrait;
use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Zed\Catalog\Component\Exporter\ProductsExporter as CoreProductsExporter;
use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;
use ProjectA\Zed\Yves\Component\Model\Export\AbstractExport;
use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

abstract class ProductsExporter extends CoreProductsExporter implements
    \ProjectA_Zed_Yves_Component_Interface_Exporter_KeyValue,
    ProductAttributeConstantInterface,
    ProductAttributeSetConstantInterface,
    \Pyz_Shared_Library_StorageKeyConstant,
    YvesFacadeInterface
{

    use YvesFacadeTrait;

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
        $product['dimension_in_cm'] = round($product['width']/10) . ' x ' . round($product['height']/10) . ' x ' . round($product['depth']/10) . ' cm';
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
        $task = $this->facadeYves->createExporterSetupRaw();
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
            $allData = $this->addProductData($product, $allData);
            $allData = $this->addProductSkuMapping($product, $allData);
            $allData = $this->addUrlProductMapping($product, $allData);

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

    /**
     * @param array $product
     * @param array $allData
     * @return array
     */
    protected function addUrlProductMapping($product, $allData)
    {
        if (!empty($product['url'])) {
            $productUrlKey = StorageKeyGenerator::getProductUrlKey($product['url']);
            $allData[$productUrlKey] = (int) $product['id_catalog_product'];
        }

        return $allData;
    }

    /**
     * @param $product
     * @param $allData
     * @return mixed
     */
    protected function addProductSkuMapping($product, $allData)
    {
        $productSkuKey = StorageKeyGenerator::getProductSkuKey($product['sku']);

        $allData[$productSkuKey] = (int) $product['id_catalog_product'];
        return $allData;
    }

    /**
     * @param $product
     * @param $allData
     * @return mixed
     */
    protected function addProductData($product, $allData)
    {
        $pairProductData = $this->mergeImagesToArray($product);
        $pairProductData = $this->transformProductToData($pairProductData);
        $pairProductData['url'] = $product['url'];

        $productKey = StorageKeyGenerator::getProductKey($product['id_catalog_product']);
        $allData[$productKey] = json_encode($pairProductData);

        return $allData;
    }
}
