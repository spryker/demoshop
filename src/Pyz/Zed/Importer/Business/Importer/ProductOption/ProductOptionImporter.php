<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\ProductOption;

use Generated\Shared\Transfer\ProductOptionGroupTransfer;
use Generated\Shared\Transfer\ProductOptionValueTransfer;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroupQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery;
use Orm\Zed\Tax\Persistence\SpyTaxSetQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Glossary\Business\GlossaryFacadeInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionImporter extends AbstractImporter
{

    const COL_ABSTRACT_PRODUCT_SK_US = 'Abstract Product SKUs';
    const COL_OPTION_NAME_TRANSLATION_KEY = 'Option name translation key';
    const COL_OPTION_NAME_DE = 'Option name de_DE';
    const COL_OPTION_NAME_EN = 'Option name en_US';
    const COL_OPTION_PRICE = 'Option Price';
    const COL_OPTION_SKU = 'Option SKU';
    const COL_OPTION_GROUP_NAME_TRANSLATION_KEY = 'Group name translation key';
    const COL_GROUP_NAME_EN = 'Group name en_US';
    const COL_GROUP_NAME_DE = 'Group name de_DE';
    const COL_TAX_SET = 'Tax set';

    const GERMAN_LOCALE = 'de_DE';
    const ENGLISH_LOCALE = 'en_US';

    const SKU_SEPARATOR = ',';

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

        $this->createTranslations($data);

        $productOptionValueTransfer = $this->createProductOptionValueTransfer($data);

        $abstractProductSKUs = $this->extractSku($data);
        if (count($abstractProductSKUs) > 0) {
            if ($this->isOptionGroupExisting($data[self::COL_OPTION_GROUP_NAME_TRANSLATION_KEY])) {
                return;
            }

            $this->lastGroupId = $this->createOptionGroup($data, $productOptionValueTransfer);
            $this->addProductAbstractToGroup($abstractProductSKUs, $this->lastGroupId);

            return;
        }

        if ($this->isOptionValueExisting($productOptionValueTransfer->getValue())) {
            return;
        }

        $productOptionValueTransfer->setFkProductOptionGroup($this->lastGroupId);
        $this->productOptionFacade->saveProductOptionValue($productOptionValueTransfer);
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductOptionValueQuery::create();

        return $query->count() > 0;
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
        return SpyProductOptionValueQuery::create()
            ->findByValue(ProductOptionConfig::PRODUCT_OPTION_TRANSLATION_PREFIX . $value)
            ->count() > 0;
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
     *
     * @return \Generated\Shared\Transfer\ProductOptionValueTransfer
     */
    protected function createProductOptionValueTransfer(array $data)
    {
        $productOptionValueTransfer = new ProductOptionValueTransfer();
        $productOptionValueTransfer->setPrice($this->formatPrice($data) * 100);
        $productOptionValueTransfer->setValue($data[self::COL_OPTION_NAME_TRANSLATION_KEY]);
        $productOptionValueTransfer->setSku($data[self::COL_OPTION_SKU]);

        return $productOptionValueTransfer;
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\ProductOptionValueTransfer $productOptionValueTransfer
     *
     * @return int
     */
    protected function createOptionGroup(array $data, ProductOptionValueTransfer $productOptionValueTransfer)
    {
        $productOptionGroupTransfer = new ProductOptionGroupTransfer();
        $productOptionGroupTransfer->setActive(true);
        $productOptionGroupTransfer->setName($data[self::COL_OPTION_GROUP_NAME_TRANSLATION_KEY]);
        $productOptionGroupTransfer->addProductOptionValue($productOptionValueTransfer);
        $productOptionGroupTransfer->setFkTaxSet(
            $this->getIdTaxSetBySetName($data[self::COL_TAX_SET])
        );

        $idProductOptionGroup = $this->productOptionFacade->saveProductOptionGroup($productOptionGroupTransfer);

        return $idProductOptionGroup;
    }

    /**
     * @param string $taxSetName
     *
     * @return int
     */
    protected function getIdTaxSetBySetName($taxSetName)
    {
        $taxSetEntity = SpyTaxSetQuery::create()->findOneByName($taxSetName);

        return $taxSetEntity->getIdTaxSet();
    }

    /**
     * @param string $glossaryKey
     * @param string $enTranslation
     * @param string $deTranslation
     *
     * @return void
     */
    protected function translate($glossaryKey, $enTranslation, $deTranslation)
    {
        if (!$this->glossaryFacade->hasKey($glossaryKey)) {
            $this->glossaryFacade->createKey($glossaryKey);
        }

        $locale = $this->localeFacade->getLocaleByCode(self::GERMAN_LOCALE);
        if (!$this->glossaryFacade->hasTranslation($glossaryKey, $locale)) {
            $this->glossaryFacade->createAndTouchTranslation($glossaryKey, $locale, $deTranslation);
        }

        $locale = $this->localeFacade->getLocaleByCode(self::ENGLISH_LOCALE);
        if (!$this->glossaryFacade->hasTranslation($glossaryKey, $locale)) {
            $this->glossaryFacade->createAndTouchTranslation($glossaryKey, $locale, $enTranslation);
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
        return explode(self::SKU_SEPARATOR, $data[self::COL_ABSTRACT_PRODUCT_SK_US]);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function createTranslations(array $data)
    {
        $this->translate($data[self::COL_OPTION_GROUP_NAME_TRANSLATION_KEY], $data[self::COL_GROUP_NAME_EN], $data[self::COL_GROUP_NAME_DE]);
        $this->translate($data[self::COL_OPTION_NAME_TRANSLATION_KEY], $data[self::COL_OPTION_NAME_EN], $data[self::COL_OPTION_NAME_DE]);
    }

}
