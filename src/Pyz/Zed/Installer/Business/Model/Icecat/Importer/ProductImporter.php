<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale;
use Pyz\Zed\Product\Business\ProductFacade;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;

class ProductImporter extends AbstractIcecatImporter
{

    const PRODUCT_ABSTRACT = 'product_abstract';
    const PRODUCT_CONCRETE_COLLECTION = 'product_concrete_collection';

    /**
     * @var array
     */
    protected $urlReplacements = [
        ' ' => '-',
        ',' => '',
        'ä' => 'ae',
        'ö' => 'oe',
        'ü' => 'ue',
        'ß' => 'ss',
    ];

    /**
     * @var \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var \Pyz\Zed\Product\Business\ProductFacade
     */
    protected $productFacade;

    protected function getColumnHeader()
    {
        return 'slug,variantId,sku,productType,name.en,manufacturer_name,manufacturer_icecat_id,manufacturer_icecat_original_id,manufacturer_product_id,manufacturer_product_id_normal,ean_upc_set,images,image_url_small,image_url_thumb,category_name.en,category_icecat_id,category_uncat_it,categories,tax,icecat_data_quality,icecat_factsheet_url,icecat_xml_data_url,on_market,on_market_countries_set,icecat_last_updated';
    }

    /**
     * @param \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface $attributeManager
     */
    public function setAttributeManager(AttributeManagerInterface $attributeManager)
    {
        $this->attributeManager = $attributeManager;
    }

    /**
     * @param \Pyz\Zed\Product\Business\ProductFacade $productFacade
     */
    public function setProductFacade(ProductFacade $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @return bool
     */
    public function canImport()
    {
        return false;
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale $icecatLocale
     *
     * @return void
     */
    protected function importData(LocaleTransfer $localeTransfer, IcecatLocale $icecatLocale)
    {
        $csvFile = $this->getCsvFile('products.csv');
        $currentLine = 0;
        $max = 2;

        while (!$csvFile->eof()) {
            $data = explode(',', $csvFile->fgets());
            $product = $this->format($data);

            /* @var ProductAbstractTransfer $productAbstract */
            $productAbstract = $product[self::PRODUCT_ABSTRACT];
            $productConcreteCollection = $product[self::PRODUCT_CONCRETE_COLLECTION];

            $sku = $productAbstract->getSku();

            if ($this->productFacade->hasProductAbstract($sku)) {
                continue;
            }

            $idProductAbstract = $this->productFacade->createProductAbstract($productAbstract);
            $productAbstract->setIdProductAbstract($idProductAbstract);
            $this->createProductConcreteCollection($productConcreteCollection, $idProductAbstract);
            $this->productFacade->touchProductActive($idProductAbstract);
            $this->createAndTouchProductUrls($productAbstract, $idProductAbstract);

            if ($currentLine > $max) {
                break;
            }

            $currentLine++;
        }
    }

    protected function extractAttributes()
    {
    }

    protected function hasVariants()
    {
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
        $columns = $this->getColumns();
        $product = array_combine(array_values($columns), array_values($data));

        $productImageUrl = $product['images'];
        $thumbImageUrl = $product['image_url_thumb'];

        $attributes = [
            'price' => (float) rand(0.01, 1999.99),
            'width' => (float) rand(1.0, 10.0),
            'height' => (float) rand(1.0, 10.0),
            'depth' => (float) rand(1.0, 10.0),
        ];

        $productAbstract = new ProductAbstractTransfer();
        $productConcrete = new ProductConcreteTransfer();

        $locales = $this->localeManager->getLocaleTransferCollection();

        foreach ($locales as $localeCode => $localeTransfer) {
            $localizedAttributes = new LocalizedAttributesTransfer();
            $localizedAttributes->setAttributes([
                'image_url' => '/images/product/' . $productImageUrl,
                'thumbnail_url' => '/images/product/' . $thumbImageUrl,
                'main_color' => 'color',
                'other_colors' => 'other colors',
                'description' => $product['name.en'],
                'description_long' => '',
                'fun_fact' => 'fun fact',
                'scientific_name' => 'scientific name',
            ]);
            $localizedAttributes->setLocale($localeTransfer);
            $localizedAttributes->setName($product['name.en']);

            $productAbstract->addLocalizedAttributes($localizedAttributes);
            $productConcrete->addLocalizedAttributes($localizedAttributes);
        }

        $productAbstract->setSku($product['sku']);
        $productAbstract->setAttributes($attributes);

        $productConcrete->setSku($product['sku']);
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
     * @param \Generated\Shared\Transfer\LocaleTransfer $currentLocale
     */
    protected function createAndTouchProductUrls(
        ProductAbstractTransfer $productAbstract,
        $idProductAbstract
    ) {
        foreach ($productAbstract->getLocalizedAttributes() as $localizedAttributes) {
            $productAbstractUrl = $this->buildProductUrl($localizedAttributes);
            $this->productFacade->createAndTouchProductUrlByIdProduct(
                $idProductAbstract,
                $productAbstractUrl,
                $localizedAttributes->getLocale()
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\LocalizedAttributesTransfer $localizedAttributes
     *
     * @return string
     */
    protected function buildProductUrl(LocalizedAttributesTransfer $localizedAttributes)
    {
        $searchStrings = array_keys($this->urlReplacements);
        $replaceStrings = array_values($this->urlReplacements);

        $productUrl = strtolower($localizedAttributes->getName());
        $productUrl = trim($productUrl);
        $productUrl = str_replace($searchStrings, $replaceStrings, $productUrl);

        return '/' . mb_substr($localizedAttributes->getLocale()->getLocaleName(), 0, 2) . '/' . $productUrl;
    }

}
