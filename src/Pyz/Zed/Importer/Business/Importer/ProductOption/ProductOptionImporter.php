<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductOption;

use Generated\Shared\Transfer\ProductOptionGroupTransfer;
use Generated\Shared\Transfer\ProductOptionValueTransfer;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroupQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Glossary\Business\GlossaryFacadeInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionImporter extends AbstractImporter
{
    const COL_ABSTRACT_PRODUCT_SK_US = 'Abstract Product SKUs';
    const COL_GLOSSARY_KEY = 'Glossary key';
    const COL_OPTION_NAME_DE = 'Option Name_DE';
    const COL_OPTION_NAME_EN = 'Option Name_EN';
    const COL_OPTION_PRICE = 'Option Price';
    const COL_OPTION_SKU = 'Option SKU';
    const COL_OPTION_GROUP_NAME = 'Option Group Name';

    const GERMAN_LOCALE = 'de_DE';
    const ENGLISH_LOCALE = 'en_US';

    /**
     * @var \Spryker\Zed\Glossary\Business\GlossaryFacadeInterface
     */
    protected $glossaryFacade;

    /**
     * @var \Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface
     */
    protected $productOptionFacade;

    /**
     * @var int
     */
    protected $lastGroupId;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Glossary\Business\GlossaryFacadeInterface $glossaryFacade
     * @param \Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface $productOptionFacade
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        GlossaryFacadeInterface $glossaryFacade,
        ProductOptionFacadeInterface $productOptionFacade
    ) {
        parent::__construct($localeFacade);
        $this->glossaryFacade = $glossaryFacade;
        $this->productOptionFacade = $productOptionFacade;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $data[self::COL_GLOSSARY_KEY] = $this->sanitizeTranslationKey($data[self::COL_GLOSSARY_KEY]);

        $this->createTranslations($data);
        $productOptionValueTransfer = $this->createProductOptionValueTransfer($data, $data[self::COL_GLOSSARY_KEY]);

        $abstractProductSKUs = $this->extractSku($data);
        if (count($abstractProductSKUs) > 0) {

            $data[self::COL_OPTION_GROUP_NAME] = $this->sanitizeTranslationKey($data[self::COL_OPTION_GROUP_NAME]);
            if ($this->isOptionGroupExisting($data[self::COL_OPTION_GROUP_NAME])) {
                return;
            }

            $this->lastGroupId = $this->createOptionGroup($data, $productOptionValueTransfer);
            $this->addProductAbstractToGroup($abstractProductSKUs, $this->lastGroupId);
        } else {
            $productOptionValueTransfer->setFkProductOptionGroup($this->lastGroupId);

            if ($this->isOptionValueExisting($productOptionValueTransfer->getValue())) {
                return;
            }

            $this->productOptionFacade->saveProductOptionValue($productOptionValueTransfer);
        }
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Option';
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    protected function isOptionValueExisting($value)
    {
        return SpyProductOptionValueQuery::create()->findByValue(ProductOptionConfig::PRODUCT_OPTION_TRANSLATION_PREFIX . $value)->count() > 0;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    protected function isOptionGroupExisting($name)
    {
        return SpyProductOptionGroupQuery::create()
            ->findByName(ProductOptionConfig::PRODUCT_OPTION_GROUP_NAME_TRANSLATION_PREFIX . $name)
            ->count() > 0;
    }

    /**
     * @param array $data
     * @param string $glossaryKey
     *
     * @return \Generated\Shared\Transfer\ProductOptionValueTransfer
     */
    protected function createProductOptionValueTransfer(array $data, $glossaryKey)
    {
        $productOptionValueTransfer = new ProductOptionValueTransfer();
        $productOptionValueTransfer->setPrice($this->formatPrice($data) * 100);
        $productOptionValueTransfer->setValue($glossaryKey);
        $productOptionValueTransfer->setSku($data[self::COL_OPTION_SKU]);

        return $productOptionValueTransfer;
    }

    /**
     * @param ProductOptionValueTransfer $productOptionValueTransfer
     *
     * @return int
     */
    protected function createOptionGroup(array $data, ProductOptionValueTransfer $productOptionValueTransfer)
    {
        $productOptionGroupTransfer = new ProductOptionGroupTransfer();
        $productOptionGroupTransfer->setActive(true);
        $productOptionGroupTransfer->setName($data[self::COL_OPTION_GROUP_NAME]);
        $productOptionGroupTransfer->addProductOptionValue($productOptionValueTransfer);

        $idProductOptionGroup = $this->productOptionFacade->saveProductOptionGroup($productOptionGroupTransfer);

        return $idProductOptionGroup;
    }

    /**
     * @param string $translationKey
     *
     * @return string
     */
    protected function sanitizeTranslationKey($translationKey)
    {
        $translationKey = trim($translationKey);
        $translationKey = strtolower($translationKey);

        return preg_replace('/\s+/', '_', $translationKey);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function createTranslations(array $data)
    {
        $glossaryKey = ProductOptionConfig::PRODUCT_OPTION_TRANSLATION_PREFIX . $data[self::COL_GLOSSARY_KEY];
        if (!$this->glossaryFacade->hasKey($glossaryKey)) {
            $this->glossaryFacade->createKey($glossaryKey);
        }

        $nameDE = $data[self::COL_OPTION_NAME_DE];
        $locale = $this->localeFacade->getLocaleByCode(self::GERMAN_LOCALE);
        if (!$this->glossaryFacade->hasTranslation($glossaryKey, $locale)) {
            $this->glossaryFacade->createAndTouchTranslation($glossaryKey, $locale, $nameDE);
        }

        $nameEN = $data[self::COL_OPTION_NAME_EN];
        $locale = $this->localeFacade->getLocaleByCode(self::ENGLISH_LOCALE);
        if (!$this->glossaryFacade->hasTranslation($glossaryKey, $locale)) {
            $this->glossaryFacade->createAndTouchTranslation($glossaryKey, $locale, $nameEN);
        }
    }

    /**
     * @param array $data
     *
     * @return string
     */
    protected function formatPrice(array $data)
    {
        return str_replace('€', '', $data[self::COL_OPTION_PRICE]);
    }

    /**
     * @param array $abstractProductSKUs
     * @param int $idProductOptionGroup
     *
     * @return void
     */
    protected function addProductAbstractToGroup(array $abstractProductSKUs, $idProductOptionGroup)
    {
        foreach ($abstractProductSKUs as $sku) {
            $this->productOptionFacade->addProductAbstractToProductOptionGroup($sku, $idProductOptionGroup);
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function extractSku(array $data)
    {
        if (!$data[self::COL_ABSTRACT_PRODUCT_SK_US]) {
            return [];
        }
        return explode(',', $data[self::COL_ABSTRACT_PRODUCT_SK_US]);
    }
}
