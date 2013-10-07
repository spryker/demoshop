<?php

class Pyz_Zed_ProductImage_Component_Settings implements ProjectA_Zed_Library_Component_Interface_SettingsInterface
{

    const PRODUCT_TYPE_SIMPLE = 'simple';
    const PRODUCT_TYPE_CONFIG = 'config';
    const PRODUCT_TYPE_BUNDLE = 'bundle';

    /**
     * @return string
     */
    public function getPathToProcessableImages()
    {
        return APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'share';
    }

    public function getProductImageSeoFilenameBySku($sku)
    {
        $type = $this->getProductTypeBySku($sku);

        switch ($type) {
            case self::PRODUCT_TYPE_CONFIG:
                return $this->getConfigProductImageSeoFilenameBySku($sku);
                break;

            case self::PRODUCT_TYPE_SIMPLE:
                return $this->getSimpleProductImageSeoFilenameBySku($sku);
                break;

            case self::PRODUCT_TYPE_BUNDLE:
                return $this->getDefaultProductImageSeoFilenameBySku($sku);
                break;

            default:
                return $this->getDefaultProductImageSeoFilenameBySku($sku);
        }
    }

    /**
     * @param string $sku
     * @return string
     */
    protected function getProductTypeBySku($sku)
    {
        return self::PRODUCT_TYPE_SIMPLE;
    }

    /**
     * @param $sku
     * @return mixed
     */
    protected function getDefaultProductImageSeoFilenameBySku($sku)
    {
        return $sku;
    }


    protected function getConfigProductImageSeoFilenameBySku($sku)
    {
        $attributeSet = null;
        switch ($attributeSet)

    }

    protected function getSimpleProductImageSeoFilenameBySku($sku)
    {

    }

    protected function getBundleProductImageSeoFilenameBySku($sku)
    {

    }

}
