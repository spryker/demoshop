<?php

use Symfony\Component\Finder\Finder;

class Pyz_Zed_ProductImage_Component_Model_Processor implements
    Pyz_Zed_ProductImage_Component_Dependency_Facade_Interface
{

    use Pyz_Zed_ProductImage_Component_Dependency_Facade_Trait;

    const IMAGE_ORDER_DELIMITER = '__';

    public function run()
    {
        $this->getFilesToProcess();
    }

    protected function getFilesToProcess()
    {
        $pathToProcessableImages = $this->facadeProductImage->getSettings()->getPathToProcessableImages();

        $finder = new Finder();
        $finder->files()->in($pathToProcessableImages)->files()->ignoreDotFiles(true)->ignoreVCS(true);

        $imageFiles = [];
        foreach ($finder as $file) {
            $imageFiles[] = [
                'sku' => $this->getSkuFromImageFilename($file->getFileName()),
                'filename' => $file->getFileName(),
                'order' => $this->getImageOrder($file->getFileName())
            ];
        }

        echo '<pre>';
        var_dump($imageFiles);
        echo __CLASS__ . '(' . __LINE__ . ')';
        echo '</pre>';
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
