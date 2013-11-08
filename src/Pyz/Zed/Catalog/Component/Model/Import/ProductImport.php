<?php
namespace Pyz\Zed\Catalog\Component\Model\Import;

use ProjectA\Zed\Catalog\Component\Model\Import\ProductImport as CoreProductImport;
use ProjectA\Zed\Catalog\Component\Model\ProductInterface;
use ProjectA\Zed\Catalog\Component\Model\UrlGenerator;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

class ProductImport extends CoreProductImport implements
    \ProjectA_Zed_Library_Dependency_InitInterface,
    ProductAttributeSetConstantInterface
{
    /**
     * @var array
     */
    protected $attributeToValueTypeMapping = [
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS => [
            self::CONFIG_ATTRIBUTES => [],
            self::SIMPLE_ATTRIBUTES => []
        ],
        self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS => [
            self::CONFIG_ATTRIBUTES => [],
            self::SIMPLE_ATTRIBUTES => []
        ]
    ];

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
     * @param ProductInterface $product
     * @return string
     */
    protected function createProductUrl(ProductInterface $product)
    {
        return $this->urlGenerator->createProductDetailUrl($product);
    }

    protected function loadValueTypeMappings()
    {
        $this->attributeToValueTypeMapping[self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS][self::CONFIG_ATTRIBUTES] =
            $this->getValueTypesForAttributeSetByGroup(self::CONFIG_ATTRIBUTES, $this->attributeSetsMap->get(self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS));
        $this->attributeToValueTypeMapping[self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS][self::SIMPLE_ATTRIBUTES] =
            $this->getValueTypesForAttributeSetByGroup(self::SIMPLE_ATTRIBUTES, $this->attributeSetsMap->get(self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS));

        $this->attributeToValueTypeMapping[self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS][self::CONFIG_ATTRIBUTES] =
            $this->getValueTypesForAttributeSetByGroup(self::CONFIG_ATTRIBUTES, $this->attributeSetsMap->get(self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS));
        $this->attributeToValueTypeMapping[self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS][self::SIMPLE_ATTRIBUTES] =
            $this->getValueTypesForAttributeSetByGroup(self::SIMPLE_ATTRIBUTES, $this->attributeSetsMap->get(self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS));
    }
}
