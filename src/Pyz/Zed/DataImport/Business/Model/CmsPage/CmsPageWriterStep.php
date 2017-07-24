<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsPage;

use Orm\Zed\Cms\Persistence\SpyCmsGlossaryKeyMappingQuery;
use Orm\Zed\Cms\Persistence\SpyCmsPage;
use Orm\Zed\Cms\Persistence\SpyCmsPageLocalizedAttributesQuery;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Orm\Zed\Cms\Persistence\SpyCmsTemplateQuery;
use Orm\Zed\Cms\Persistence\SpyCmsVersion;
use Orm\Zed\Cms\Persistence\SpyCmsVersionQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep;
use Pyz\Zed\Glossary\GlossaryConfig;
use Spryker\Service\UtilEncoding\UtilEncodingService;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Version\Mapper\VersionDataMapper;
use Spryker\Zed\Cms\Business\Version\VersionGenerator;
use Spryker\Zed\Cms\Dependency\Service\CmsToUtilEncodingBridge;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Url\UrlConfig;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
class CmsPageWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_TEMPLATE_NAME = 'template_name';
    const KEY_PAGE_KEY = 'page_key';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_IS_SEARCHABLE = 'is_searchable';
    const KEY_NAME = 'name';
    const KEY_META_TITLE = 'meta_title';
    const KEY_META_DESCRIPTION = 'meta_description';
    const KEY_META_KEYWORDS = 'meta_keywords';
    const KEY_URL = 'url';
    const KEY_PUBLISH = 'publish';

    const KEY_PLACEHOLDER_TITLE = 'placeholder.title';
    const KEY_PLACEHOLDER_CONTENT = 'placeholder.content';

    /**
     * @var \Spryker\Zed\Cms\Business\Version\Mapper\VersionDataMapperInterface
     */
    protected $versionDataMapper;

    /**
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     */
    public function __construct(DataImportToTouchInterface $touchFacade)
    {
        parent::__construct($touchFacade);

        $utilEncodingBridge = new CmsToUtilEncodingBridge(new UtilEncodingService());
        $this->versionDataMapper = new VersionDataMapper($utilEncodingBridge);
    }

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
            ->setIsSearchable($dataSet[static::KEY_IS_SEARCHABLE]);

        if ($cmsPageEntity->isNew() || $cmsPageEntity->isModified()) {
            $cmsPageEntity->save();
        }

        foreach ($dataSet[LocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $attributes) {
            $localizedAttributesEntity = SpyCmsPageLocalizedAttributesQuery::create()
                ->filterByFkCmsPage($cmsPageEntity->getIdCmsPage())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $localizedAttributesEntity->fromArray($attributes);

            if ($localizedAttributesEntity->isNew() || $localizedAttributesEntity->isModified()) {
                $localizedAttributesEntity->save();
            }

            $urlEntity = SpyUrlQuery::create()
                ->filterByFkResourcePage($cmsPageEntity->getIdCmsPage())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $urlEntity
                ->setUrl($attributes[static::KEY_URL]);

            if ($urlEntity->isNew() || $urlEntity->isModified()) {
                $urlEntity->save();
            }

            $this->addSubTouchable(UrlConfig::RESOURCE_TYPE_URL, $urlEntity->getIdUrl());
        }

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
                    ->setValue($value);

                if ($glossaryTranslationEntity->isNew() || $glossaryTranslationEntity->isModified()) {
                    $glossaryTranslationEntity->save();
                }

                $pageKeyMappingEntity = SpyCmsGlossaryKeyMappingQuery::create()
                    ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                    ->filterByFkPage($cmsPageEntity->getIdCmsPage())
                    ->findOneOrCreate();

                $pageKeyMappingEntity
                    ->setPlaceholder($key);

                if ($pageKeyMappingEntity->isNew() || $pageKeyMappingEntity->isModified()) {
                    $pageKeyMappingEntity->save();
                }

                $this->addSubTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
            }
        }

        if ((int)$dataSet[static::KEY_PUBLISH] === 1) {
            $this->publishWithVersion($cmsPageEntity);
        }
    }

    /**
     * @param \Orm\Zed\Cms\Persistence\SpyCmsPage $cmsPageEntity
     *
     * @return \Generated\Shared\Transfer\CmsVersionTransfer
     */
    public function publishWithVersion(SpyCmsPage $cmsPageEntity)
    {
        $cmsVersionDataTransfer = $this->versionDataMapper->mapToCmsVersionDataTransfer($cmsPageEntity);
        $encodedData = $this->versionDataMapper->mapToJsonData($cmsVersionDataTransfer);

        $this->createCmsVersion($encodedData, $cmsPageEntity->getIdCmsPage());
    }

    /**
     * @param string $data
     * @param int $idCmsPage
     *
     * @return \Generated\Shared\Transfer\CmsVersionTransfer
     */
    protected function createCmsVersion($data, $idCmsPage)
    {
        $versionNumber = $this->generateNewCmsVersion($idCmsPage);
        $versionName = $this->generateNewCmsVersionName($versionNumber);

        $this->saveAndTouchCmsVersion($data, $idCmsPage, $versionName, $versionNumber);
    }

    /**
     * @param int $idCmsPage
     *
     * @return int
     */
    public function generateNewCmsVersion($idCmsPage)
    {
        $cmsVersionEntity = SpyCmsVersionQuery::create()
            ->filterByFkCmsPage($idCmsPage)
            ->orderByVersion(Criteria::DESC)
            ->findOne();

        if ($cmsVersionEntity === null) {
            return VersionGenerator::DEFAULT_VERSION_NUMBER;
        }

        return $cmsVersionEntity->getVersion() + 1;
    }

    /**
     * @param int $versionNumber
     *
     * @return string
     */
    public function generateNewCmsVersionName($versionNumber)
    {
        return sprintf('v. %d', $versionNumber);
    }

    /**
     * @param string $data
     * @param int $idCmsPage
     * @param string $versionName
     * @param int $versionNumber
     *
     * @return void
     */
    protected function saveAndTouchCmsVersion($data, $idCmsPage, $versionName, $versionNumber)
    {
        $this->saveCmsVersion($idCmsPage, $data, $versionNumber, $versionName);

        $this->addMainTouchable(CmsConstants::RESOURCE_TYPE_PAGE, $idCmsPage);
    }

    /**
     * @param int $idCmsPage
     * @param string $data
     * @param int $versionNumber
     * @param string $versionName
     *
     * @return void
     */
    protected function saveCmsVersion($idCmsPage, $data, $versionNumber, $versionName)
    {
        $cmsVersionEntity = new SpyCmsVersion();
        $cmsVersionEntity
            ->setFkCmsPage($idCmsPage)
            ->setData($data)
            ->setVersion($versionNumber)
            ->setVersionName($versionName)
            ->save();
    }

}
