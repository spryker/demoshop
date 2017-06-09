<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlock;

use Orm\Zed\Cms\Persistence\SpyCmsBlockQuery;
use Orm\Zed\Cms\Persistence\SpyCmsGlossaryKeyMappingQuery;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Orm\Zed\Cms\Persistence\SpyCmsTemplateQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Pyz\Zed\DataImport\Business\Model\CmsPage\PlaceholderExtractorStep;
use Pyz\Zed\Glossary\GlossaryConfig;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CmsBlockWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_BLOCK_NAME = 'block_name';
    const KEY_BLOCK_TYPE = 'type';
    const KEY_BLOCK_VALUE = 'value';
    const KEY_TEMPLATE_NAME = 'template_name';
    const KEY_PAGE_KEY = 'page_key';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_IS_SEARCHABLE = 'is_searchable';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $templateEntity = SpyCmsTemplateQuery::create()
            ->findOneByTemplateName($dataSet[static::KEY_TEMPLATE_NAME]);

        $cmsPageEntity = SpyCmsPageQuery::create()
            ->filterByPageKey($dataSet[static::KEY_PAGE_KEY])
            ->findOneOrCreate();

        $cmsPageEntity
            ->setFkTemplate($templateEntity->getIdCmsTemplate())
            ->setIsActive($dataSet[static::KEY_IS_ACTIVE])
            ->setIsSearchable($dataSet[static::KEY_IS_SEARCHABLE])
            ->save();

        $cmsBlockEntity = SpyCmsBlockQuery::create()
            ->filterByFkPage($cmsPageEntity->getIdCmsPage())
            ->filterByName($dataSet[static::KEY_BLOCK_NAME])
            ->findOneOrCreate();

        $cmsBlockEntity
            ->setType($dataSet[static::KEY_BLOCK_TYPE])
            ->setValue($dataSet[static::KEY_BLOCK_VALUE])
            ->save();

        foreach ($dataSet[PlaceholderExtractorStep::KEY_PLACEHOLDER] as $idLocale => $placeholder) {
            foreach ($placeholder as $key => $value) {
                $uniquePlaceholder = $key . '-' . $cmsPageEntity->getIdCmsPage();

                $keyName = GlossaryKeyMappingManager::GENERATED_GLOSSARY_KEY_PREFIX . '.';
                $keyName .= str_replace([' ', '.'], '-', $cmsPageEntity->getCmsTemplate()->getTemplateName()) . '.';
                $keyName .= str_replace([' ', '.'], '-', $uniquePlaceholder);
                $keyName .= 0;

                $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
                    ->filterByKey($keyName)
                    ->findOneOrCreate();

                $glossaryKeyEntity->save();

                $glossaryTranslationEntity = SpyGlossaryTranslationQuery::create()
                    ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                    ->filterByFkLocale($idLocale)
                    ->findOneOrCreate();

                $glossaryTranslationEntity
                    ->setValue($value)
                    ->save();

                $pageKeyMappingEntity = SpyCmsGlossaryKeyMappingQuery::create()
                    ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                    ->filterByFkPage($cmsPageEntity->getIdCmsPage())
                    ->findOneOrCreate();

                $pageKeyMappingEntity
                    ->setPlaceholder($key)
                    ->save();

                $this->addSubTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
            }
        }

        $this->addMainTouchable(CmsConstants::RESOURCE_TYPE_BLOCK, $cmsBlockEntity->getIdCmsBlock());
        $this->addSubTouchable(CmsConstants::RESOURCE_TYPE_PAGE, $cmsPageEntity->getIdCmsPage());
    }

}
