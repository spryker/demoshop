<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductSearchAttribute;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchAttributeQuery;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Pyz\Zed\Glossary\GlossaryConfig;
use Spryker\Shared\ProductSearch\Code\KeyBuilder\GlossaryKeyBuilderInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

class ProductSearchAttributeWriter extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    const KEY = 'key';

    /**
     * @var \Spryker\Shared\ProductSearch\Code\KeyBuilder\GlossaryKeyBuilderInterface
     */
    protected $glossaryKeyBuilder;

    /**
     * @param \Spryker\Shared\ProductSearch\Code\KeyBuilder\GlossaryKeyBuilderInterface $glossaryKeyBuilder
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param int|null $bulkSize
     */
    public function __construct(GlossaryKeyBuilderInterface $glossaryKeyBuilder, DataImportToTouchInterface $touchFacade, $bulkSize = null)
    {
        parent::__construct($touchFacade, $bulkSize);

        $this->glossaryKeyBuilder = $glossaryKeyBuilder;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $query = SpyProductSearchAttributeQuery::create();
        $productSearchAttributeEntity = $query
            ->filterByFkProductAttributeKey($dataSet[AddProductAttributeKeysStep::KEY_TARGET][$dataSet['key']])
            ->filterByFilterType($dataSet['filter_type'])
            ->findOneOrCreate();

        $productSearchAttributeEntity
            ->setPosition($dataSet['position'])
            ->setSynced((isset($dataSet['synced'])) ? $dataSet['synced'] : true)
            ->save();

        $translationKey = $this->glossaryKeyBuilder->buildGlossaryKey($dataSet['key']);
        $query = SpyGlossaryKeyQuery::create();
        $glossaryKeyEntity = $query
            ->filterByKey($translationKey)
            ->findOneOrCreate();

        $glossaryKeyEntity->save();

        foreach ($dataSet[ProductLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttribute) {
            $query = SpyGlossaryTranslationQuery::create();
            $glossaryTranslationEntity = $query
                ->filterByFkLocale($idLocale)
                ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                ->findOneOrCreate();

            $glossaryTranslationEntity->setValue($localizedAttribute['key']);
            $glossaryTranslationEntity->save();

            $this->addMainTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
        }
    }

}
