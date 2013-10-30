<?php
namespace Pyz\Zed\Catalog\Component\Model\Import;

use ProjectA\Zed\Catalog\Component\Model\Import\ProductImport as CoreProductImport;
use ProjectA\Zed\Catalog\Component\Model\UrlGenerator;

class ProductImport extends CoreProductImport implements \ProjectA_Zed_Library_Dependency_InitInterface
{

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Method is called after all dependencies are injected.
     * Use this as a replacement of __contruct() if you want to use injected objects.
     */
    public function initAfterDependencyInjection()
    {
        $this->urlGenerator = $this->factory->createModelUrlGenerator(null, '.html');
    }

    /**
     * @param \ProjectA\Zed\Catalog\Component\Model\ProductInterface $product
     * @return string
     */
    protected function createProductUrl(
        \ProjectA\Zed\Catalog\Component\Model\ProductInterface $product)
    {
        return $this->urlGenerator->createProductDetailUrl($product);
    }
}
