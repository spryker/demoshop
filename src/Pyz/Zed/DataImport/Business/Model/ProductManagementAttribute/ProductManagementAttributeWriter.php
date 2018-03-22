<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductManagementAttribute;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Orm\Zed\ProductAttribute\Persistence\SpyProductManagementAttributeQuery;
use Orm\Zed\ProductAttribute\Persistence\SpyProductManagementAttributeValueQuery;
use Orm\Zed\ProductAttribute\Persistence\SpyProductManagementAttributeValueTranslation;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Pyz\Zed\Glossary\GlossaryConfig;
use Spryker\Shared\ProductAttribute\ProductAttributeConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductManagementAttributeWriter extends TouchAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productManagementAttributeEntity = SpyProductManagementAttributeQuery::create()
            ->filterByFkProductAttributeKey($dataSet[AddProductAttributeKeysStep::KEY_TARGET][$dataSet['key']])
            ->findOneOrCreate();

        $productManagementAttributeEntity
            ->setAllowInput($dataSet['allow_input'])
            ->setInputType($dataSet['input_type']);

        $productManagementAttributeEntity->save();

        $productManagementAttributeValueEntityCollection = SpyProductManagementAttributeValueQuery::create()
            ->findByFkProductManagementAttribute($productManagementAttributeEntity->getIdProductManagementAttribute());

        foreach ($productManagementAttributeValueEntityCollection as $productManagementAttributeValueEntity) {
            foreach ($productManagementAttributeValueEntity->getSpyProductManagementAttributeValueTranslations() as $productManagementAttributeValueTranslation) {
                $productManagementAttributeValueTranslation->delete();
            }

            $productManagementAttributeValueEntity->delete();
        }

        $glossaryKey = ProductAttributeConfig::PRODUCT_ATTRIBUTE_GLOSSARY_PREFIX . $dataSet['key'];
        $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
            ->filterByKey($glossaryKey)
            ->findOneOrCreate();

        $glossaryKeyEntity->save();

        foreach ($dataSet[ProductManagementLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $attributes) {
            $glossaryTranslationEntity = SpyGlossaryTranslationQuery::create()
                ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $glossaryTranslationEntity
                ->setValue($attributes['key_translation'])
                ->save();

            $this->addMainTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());

            if (!empty($attributes['value_translations'])) {
                foreach ($attributes['value_translations'] as $value => $translation) {
                    $productManagementAttributeValueEntity = SpyProductManagementAttributeValueQuery::create()
                        ->filterBySpyProductManagementAttribute($productManagementAttributeEntity)
                        ->filterByValue($value)
                        ->findOneOrCreate();

                    $productManagementAttributeValueEntity->save();

                    $productManagementAttributeValueTranslationEntity = new SpyProductManagementAttributeValueTranslation();
                    $productManagementAttributeValueTranslationEntity
                        ->setSpyProductManagementAttributeValue($productManagementAttributeValueEntity)
                        ->setTranslation($translation)
                        ->setFkLocale($idLocale)
                        ->save();
                }

                continue;
            }

            foreach ($attributes['values'] as $value) {
                $productManagementAttributeValueEntity = SpyProductManagementAttributeValueQuery::create()
                    ->filterBySpyProductManagementAttribute($productManagementAttributeEntity)
                    ->filterByValue($value)
                    ->findOneOrCreate();

                $productManagementAttributeValueEntity->save();
            }
        }
    }
}
