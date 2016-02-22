<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Product\Business\ProductFacade;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductImporter extends AbstractIcecatImporter
{

    const NAME = 'model_name';
    const SKU = 'prod_id';

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
        $max = 10;

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $step++;
            $info = 'Importing... ' . $step . '/' . $total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
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

            if ($step > $max) {
                break;
            }
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
        dump($data);
        $productImageUrl = $data['High_res_img'];
        $thumbImageUrl = $data['Low_res_img'];

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
                'image_url' => '/images/product/' . $productImageUrl,
                'thumbnail_url' => '/images/product/' . $thumbImageUrl,
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
