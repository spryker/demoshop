<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductAbstractImporter extends AbstractIcecatImporter
{

    const NAME = 'name.en';
    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variantId';
    const IMAGE_BIG = 'image_big';
    const IMAGE_SMALL = 'image_small';
    const CATEGORY_KEY = 'category_key';
    const MANUFACTURER_NAME = 'manufacturer_name';

    const PRODUCT_ABSTRACT = 'product_abstract';
    const PRODUCT_CONCRETE_COLLECTION = 'product_concrete_collection';

    /**
     * @var \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var \Pyz\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var array
     */
    protected $cacheParents = [];

    /**
     * @param \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface $attributeManager
     */
    public function setAttributeManager(AttributeManagerInterface $attributeManager)
    {
        $this->attributeManager = $attributeManager;
    }

    /**
     * @param \Pyz\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function setProductFacade(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Abstract';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductAbstractQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     */
    public function importOne(array $data)
    {
        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($data);

        /* @var ProductAbstractTransfer $productAbstract */
        $productAbstract = $product[self::PRODUCT_ABSTRACT];
        $productConcreteCollection = $product[self::PRODUCT_CONCRETE_COLLECTION];

        $idProductAbstract = $this->productFacade->createProductAbstract($productAbstract);
        $productAbstract->setIdProductAbstract($idProductAbstract);

        $this->createProductConcreteCollection($productConcreteCollection, $idProductAbstract);

        $this->productFacade->touchProductActive($idProductAbstract);
        $this->createAndTouchProductUrls($productAbstract, $idProductAbstract);
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return (int)$variant > 1;
    }

    /**
     * @param array $productConcreteCollection
     * @param int $idProductAbstract
     */
    protected function createProductConcreteCollection(array $productConcreteCollection, $idProductAbstract)
    {
        foreach ($productConcreteCollection as $productConcrete) {
            $this->productFacade->createProductConcrete($productConcrete, $idProductAbstract);
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        $productImageUrl = $data[self::IMAGE_BIG];
        $thumbImageUrl = $data[self::IMAGE_SMALL];

        $attributes = [
            'price' => (float)rand(0.01, 1999.99),
            'width' => (float)rand(1.0, 10.0),
            'height' => (float)rand(1.0, 10.0),
            'depth' => (float)rand(1.0, 10.0),
        ];

        $productAbstract = new ProductAbstractTransfer();
        $productConcrete = new ProductConcreteTransfer();

        $locales = $this->localeManager->getLocaleCollection();

        foreach ($locales as $localeCode => $localeTransfer) {
            $localizedAttributes = new LocalizedAttributesTransfer();
            $localizedAttributes->setAttributes([
                'image_url' => $productImageUrl,
                'thumbnail_url' => $thumbImageUrl,
                'main_color' => 'color',
                'other_colors' => 'other colors',
                'description' => $data[self::NAME],
                'description_long' => '',
                'fun_fact' => 'fun fact',
                'scientific_name' => 'scientific name',
            ]);
            $localizedAttributes->setLocale($localeTransfer);
            $localizedAttributes->setName($data[self::NAME]);

            $productAbstract->addLocalizedAttributes($localizedAttributes);
            $productConcrete->addLocalizedAttributes($localizedAttributes);
        }

        $productAbstract->setSku($data[self::SKU]);
        $productAbstract->setAttributes($attributes);

        $productConcrete->setSku($data[self::SKU]);
        $productConcrete->setAttributes($attributes);
        $productConcrete->setProductImageUrl($productImageUrl);
        $productConcrete->setIsActive(true);

        return [
            self::PRODUCT_ABSTRACT => $productAbstract,
            self::PRODUCT_CONCRETE_COLLECTION => [
                $productConcrete,
            ],
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstract
     * @param int $idProductAbstract
     */
    protected function createAndTouchProductUrls(
        ProductAbstractTransfer $productAbstract,
        $idProductAbstract
    ) {
        foreach ($productAbstract->getLocalizedAttributes() as $localizedAttributes) {
            $productAbstractUrl = $this->generateProductUrl($localizedAttributes, $idProductAbstract);
            $this->productFacade->createAndTouchProductUrlByIdProduct(
                $idProductAbstract,
                $productAbstractUrl,
                $localizedAttributes->getLocale()
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\LocalizedAttributesTransfer $localizedAttributes
     * @param int $idProductAbstract
     *
     * @return string
     */
    protected function generateProductUrl(LocalizedAttributesTransfer $localizedAttributes, $idProductAbstract)
    {
        $productName = $this->slugify($localizedAttributes->getName());

        return '/' . mb_substr($localizedAttributes->getLocale()->getLocaleName(), 0, 2) . '/' . $productName . '-' . $idProductAbstract; //TODO urls should be unique
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function slugify($value)
    {
        $value = trim($value);
        $value = \transliterator_transliterate("Any-Latin; Latin-ASCII; NFD; [\u0080-\u7fff] remove; [:Nonspacing Mark:] remove; NFC; [:Punctuation:] remove; Lower();", $value);
        $value = str_replace(' ', '-', $value);

        return $value;
    }


}
