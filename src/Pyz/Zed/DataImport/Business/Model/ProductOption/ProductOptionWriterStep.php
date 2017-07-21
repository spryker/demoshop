<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductOption;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\ProductOption\Persistence\Base\SpyProductOptionGroup;
use Orm\Zed\ProductOption\Persistence\SpyProductAbstractProductOptionGroupQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionGroupQuery;
use Orm\Zed\ProductOption\Persistence\SpyProductOptionValueQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Tax\TaxSetNameToIdTaxSetStep;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Glossary\GlossaryConfig;
use Spryker\Zed\ProductOption\ProductOptionConfig;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductOptionWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_ABSTRACT_PRODUCT_SKUS = 'abstract_product_skus';
    const KEY_GROUP_NAME_TRANSLATION_KEY = 'group_name_translation_key';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_SKU = 'sku';
    const KEY_OPTION_NAME_TRANSLATION_KEY = 'option_name_translation_key';
    const KEY_PRICE = 'price';
    const KEY_OPTION_NAME = 'option_name';
    const KEY_GROUP_NAME = 'group_name';
    const KEY_TAX_SET_NAME = 'tax_set_name';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productOptionGroupEntity = SpyProductOptionGroupQuery::create()
            ->filterByName($dataSet[self::KEY_GROUP_NAME_TRANSLATION_KEY])
            ->findOneOrCreate();

        $productOptionGroupEntity
            ->setActive($this->isActive($dataSet, $productOptionGroupEntity))
            ->setFkTaxSet($dataSet[TaxSetNameToIdTaxSetStep::KEY_TARGET])
            ->save();

        $productOptionValueEntity = SpyProductOptionValueQuery::create()
            ->filterBySku($dataSet[self::KEY_SKU])
            ->filterByFkProductOptionGroup($productOptionGroupEntity->getIdProductOptionGroup())
            ->findOneOrCreate();

        $productOptionValueEntity
            ->setValue($dataSet[self::KEY_OPTION_NAME_TRANSLATION_KEY])
            ->setPrice((int)$dataSet[self::KEY_PRICE])
            ->save();

        if (!empty($dataSet[static::KEY_ABSTRACT_PRODUCT_SKUS])) {
            $abstractProductSkuCollection = explode(',', $dataSet[static::KEY_ABSTRACT_PRODUCT_SKUS]);

            $abstractProductIdCollection = SpyProductAbstractQuery::create()
                ->select([SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT])
                ->filterBySku($abstractProductSkuCollection, Criteria::IN)
                ->find();

            foreach ($abstractProductIdCollection as $idProductAbstract) {
                SpyProductAbstractProductOptionGroupQuery::create()
                    ->filterByFkProductOptionGroup($productOptionGroupEntity->getIdProductOptionGroup())
                    ->filterByFkProductAbstract($idProductAbstract)
                    ->findOneOrCreate()
                    ->save();

                $this->addSubTouchable(ProductOptionConfig::RESOURCE_TYPE_PRODUCT_OPTION, $idProductAbstract);
            }
        }

        foreach ($dataSet[ProductLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $attributes) {
            $this->findOrCreateTranslation($dataSet[static::KEY_OPTION_NAME_TRANSLATION_KEY], $attributes[static::KEY_OPTION_NAME], $idLocale);
            $this->findOrCreateTranslation($dataSet[static::KEY_GROUP_NAME_TRANSLATION_KEY], $attributes[static::KEY_GROUP_NAME], $idLocale);
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductOption\Persistence\Base\SpyProductOptionGroup $productOptionGroupEntity
     *
     * @return bool
     */
    protected function isActive(DataSetInterface $dataSet, SpyProductOptionGroup $productOptionGroupEntity)
    {
        if (isset($dataSet[self::KEY_IS_ACTIVE])) {
            return isset($dataSet[self::KEY_IS_ACTIVE]);
        }

        return ($productOptionGroupEntity->getActive() !== null) ? $productOptionGroupEntity->getActive() : true;
    }

    /**
     * @param string $key
     * @param string $translation
     * @param int $idLocale
     *
     * @return void
     */
    protected function findOrCreateTranslation($key, $translation, $idLocale)
    {
        $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
            ->filterByKey($key)
            ->findOneOrCreate();

        $glossaryKeyEntity->save();

        $glossaryTranslationEntity = SpyGlossaryTranslationQuery::create()
            ->filterByFkLocale($idLocale)
            ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
            ->findOneOrCreate();

        $glossaryTranslationEntity
            ->setValue($translation)
            ->save();

        $this->addMainTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
    }

}
