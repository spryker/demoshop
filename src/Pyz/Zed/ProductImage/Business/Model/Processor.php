<?php

use Symfony\Component\Finder\Finder;

class Pyz_Zed_ProductImage_Business_Model_Processor implements
    \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeInterface,
    \ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeInterface,
    \ProjectA\Shared\Catalog\Code\ProductAttributeConstantInterface
{

    use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeTrait;
    use \ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeTrait;

    const IMAGE_ORDER_DELIMITER = '__';
    const KEY_SKU = 'sku';
    const KEY_FILENAME = 'filename';
    const KEY_ORDER = 'order';
    const KEY_FULL_SOURCE_PATH = 'full_source_path';

    public function run()
    {
        $sortedFiles = $this->getFilesToProcess();
        $this->createProductImages($sortedFiles);
    }

    protected function getFilesToProcess()
    {
        $pathToProcessableImages = $this->facadeProductImage->createSettings()->getPathToProcessableImages();
        $finder = new Finder();
        $finder->files()->in($pathToProcessableImages)->files()->ignoreDotFiles(true)->ignoreVCS(true);

        $imageFiles = [];
        foreach ($finder as $file) {
            $imageFiles[] = [
                self::KEY_SKU => $this->getSkuFromImageFilename($file->getFileName()),
                self::KEY_FILENAME => $file->getFileName(),
                self::KEY_ORDER => $this->getImageOrder($file->getFileName()),
                self::KEY_FULL_SOURCE_PATH => $file->getPathName()
            ];
        }
        return $this->sortImageArrayByOrder($imageFiles);
    }

    /**
     * @param array $sortedImageFiles
     */
    protected function createProductImages(array $sortedImageFiles)
    {
        $extension = 'jpg';
        $filenamesForFrontend = [];
        foreach ($this->facadeImage->getImageSizes() as $size) {
            foreach ($sortedImageFiles as $file) {
                $sku = $file[self::KEY_SKU];
                $order = $file[self::KEY_ORDER];

                $filenamesForFrontend[] = $this->getFilenameForFrontend($sku, $order, $size, $extension);
                $originalImageFilename = $file[self::KEY_FULL_SOURCE_PATH];
                $productEntity = $this->facadeCatalog->getProductBySku($sku);
                $product = $this->facadeCatalog->getProduct($productEntity, [\ProjectA\Zed\Catalog\Business\Model\Attribute\GroupConstantInterface::CONFIG_ATTRIBUTES], true);
                $mappingId = $productEntity->getPrimaryKey();
                $imageEntityId = $this->facadeImage->addImage($originalImageFilename, '/tmp', $mappingId, $size->getIdImageSize(), $order, '-' . $size->getName(), $extension, \ProjectA_Zed_Image_Persistence_Propel_PacImagePeer::TYPE_PRODUCT, array());
                $this->facadeImage->addImageProduct($mappingId, $imageEntityId, $product[self::ATTRIBUTE_NAME]);

                $productEntity->touch();
            }
        }
    }

    /**
     * @param string $sku
     * @param string $order
     * @param $size
     * @param string $extension
     * @return string
     */
    protected function getFilenameForFrontend($sku, $order, $size, $extension)
    {
        $filename = $this->facadeProductImage->createSettings()->getProductImageSeoFilenameBySku($sku, $order);
        return $filename . '-' . $size->getName() . '.' . $extension;
    }

    /**
     * @param array $images
     * @return array
     */
    protected function sortImageArrayByOrder(array $images)
    {
        $order = [];
        foreach ($images as $key => $value) {
            $order[$key] = $value[self::KEY_ORDER];
        }

        array_multisort($order, SORT_DESC, $images);
        return $images;
    }

    /**
     * @param string $filename
     * @return bool
     */
    protected function isPrimaryImage($filename)
    {
        return !strpos($filename, self::IMAGE_ORDER_DELIMITER);
    }

    /**
     * @param string $filename
     */
    protected function getSkuFromImageFilename($filename)
    {
        if ($this->isPrimaryImage($filename)) {
            return explode('.', $filename)[0];
        } else {
            return explode(self::IMAGE_ORDER_DELIMITER, $filename)[0];
        }
    }

    /**
     * @param string $filename
     * @return int
     */
    protected function getImageOrder($filename)
    {
        if ($this->isPrimaryImage($filename)) {
            return 0;
        } else {
            return explode('.', explode(self::IMAGE_ORDER_DELIMITER, $filename)[1])[0];
        }
    }
}
