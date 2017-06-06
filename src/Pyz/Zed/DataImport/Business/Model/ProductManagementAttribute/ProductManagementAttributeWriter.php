<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductManagementAttribute;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\ProductManagement\Persistence\SpyProductManagementAttributeQuery;
use Orm\Zed\ProductManagement\Persistence\SpyProductManagementAttributeValue;
use Orm\Zed\ProductManagement\Persistence\SpyProductManagementAttributeValueQuery;
use Orm\Zed\ProductManagement\Persistence\SpyProductManagementAttributeValueTranslation;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductManagementAttributeWriter implements DataImportStepInterface
{

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

        $callback = function ($value) {
            return trim($value);
        };
        $values = array_map($callback, explode(',', $dataSet['values']));

        $productManagementAttributeValueEntityCollection = SpyProductManagementAttributeValueQuery::create()
            ->findByFkProductManagementAttribute($productManagementAttributeEntity->getIdProductManagementAttribute());

        foreach ($productManagementAttributeValueEntityCollection as $productManagementAttributeValueEntity) {
            foreach ($productManagementAttributeValueEntity->getSpyProductManagementAttributeValueTranslations() as $productManagementAttributeValueTranslation) {
                $productManagementAttributeValueTranslation->delete();
            }

            $productManagementAttributeValueEntity->delete();
        }

        $glossaryKey = ProductManagementConstants::PRODUCT_MANAGEMENT_ATTRIBUTE_GLOSSARY_PREFIX . $dataSet['key'];
        $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
            ->filterByKey($glossaryKey)
            ->findOneOrCreate();

        $glossaryKeyEntity->save();

        foreach ($values as $index => $value) {
            $productManagementAttributeValueEntity = new SpyProductManagementAttributeValue();
            $productManagementAttributeValueEntity
                ->setSpyProductManagementAttribute($productManagementAttributeEntity)
                ->setValue($value)
                ->save();

            foreach ($dataSet['locales'] as $localeName => $idLocale) {
                $attributeValueTranslations = $dataSet[ProductLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES][$idLocale]['values'];
                if (!empty($attributeValueTranslations)) {
                    $attributeValueTranslations = array_map($callback, explode(',', $attributeValueTranslations));

                    $productManagementAttributeValueTranslationEntity = new SpyProductManagementAttributeValueTranslation();
                    $productManagementAttributeValueTranslationEntity
                        ->setSpyProductManagementAttributeValue($productManagementAttributeValueEntity)
                        ->setTranslation($attributeValueTranslations[$index])
                        ->setFkLocale($idLocale)
                        ->save();
                }
            }

            $productManagementAttributeValueEntity->save();
        }
    }

}
