<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductImporter extends AbstractIcecatImporter
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
     * @var array
     */
    protected $cacheParents = [];

    /**
     * @var \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var \Pyz\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
     */
    protected $productCategoryFacade;

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
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     *
     * @return void
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param \Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface $productCategoryFacade
     */
    public function setProductCategoryFacade(ProductCategoryFacadeInterface $productCategoryFacade)
    {
        $this->productCategoryFacade = $productCategoryFacade;
    }

    /**
     * @return bool
     */
    public function canImport()
    {
        return true;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function importData(OutputInterface $output)
    {
        $csvFile = $this->csvReader->read('products.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $step = 0;

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $step++;
            $info = 'Importing... ' . $step . '/' . $total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            if ($this->hasVariants($csvData[self::VARIANT_ID])) {
                continue;
            }

            $product = $this->format($csvData);

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
            $this->installProductCategory($idProductAbstract, $product[self::CATEGORY_KEY]);
        }
    }

    protected function installProductCategory($sku, $categoryKey)
    {
        /*if (!array_key_exists($categoryKey, $this->cacheParents)) {

        }*/

        $categoryQuery = $this->categoryQueryContainer->queryCategoryByKey($categoryKey);
        $category = $categoryQuery->findOne();

        if (!$category) {
            return;
        }

/*        if (!$this->productFacade->hasProductAbstract($sku)) {
            return;
        }*/

        if (!$this->productCategoryFacade->hasProductCategoryMapping($sku, $categoryName, $locale)) {
            $categoryNodeIds[] = $this->productCategoryFacade
                ->createProductCategoryMapping($sku, $categoryName, $locale);
        }
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return intval($variant) > 1;
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
            'price' => (float) rand(0.01, 1999.99),
            'width' => (float) rand(1.0, 10.0),
            'height' => (float) rand(1.0, 10.0),
            'depth' => (float) rand(1.0, 10.0),
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
