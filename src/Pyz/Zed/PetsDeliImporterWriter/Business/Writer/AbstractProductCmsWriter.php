<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\Url\Business\UrlFacade;

class AbstractProductCmsWriter implements ProductWriterInterface
{

    protected $productFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param ProductDynamicFacade $productDynamicFacade
     */
    public function __construct(


    ) {


    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractProductTransfer = $this->productFacade->getAbstractProduct($product->getSku());
        $this->setPagesForProduct($product, $abstractProductTransfer);
    }

    protected function setPagesForProduct(
        PavProductDynamicImporterAbstractProductInterface $product,
        AbstractProductInterface $abstractProductTransfer
    ) {
        $productLocales = $product->getLocales();
        foreach ($productLocales as $productLocale) {
            $localeTransfer = $this->localeFacade->getLocale($productLocale->getLocale());
            $url = $productLocale->getUrl();

            $pageTransfer = $this->cmsFacade->getPageByAbstractProduct($abstractProductTransfer);

            if ($pageTransfer->getIdCmsPage()) {
                $urlTransfer = $this->urlFacade->getUrlByIdPage($pageTransfer->getIdCmsPage());
            } else {

            }

            $urlTransfer
                ->setUrl($url)
                ->setFkLocale($localeTransfer->getIdLocale())
                ->setFkPage($pageTransfer->getIdCmsPage());


            //$urlTranfer = $this->urlFacade->getUrlByIdAbstractProductAndIdLocale($abstractProduct->getIdAbstractProduct(), $localeTransfer->getIdLocale());


        }


    }


}
