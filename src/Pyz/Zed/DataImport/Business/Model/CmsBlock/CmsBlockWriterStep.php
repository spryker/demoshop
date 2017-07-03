<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\CmsBlock;

use Orm\Zed\CmsBlock\Persistence\SpyCmsBlock;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockGlossaryKeyMappingQuery;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockTemplate;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockTemplateQuery;
use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryConnectorQuery;
use Orm\Zed\CmsBlockProductConnector\Persistence\SpyCmsBlockProductConnectorQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface;
use Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Pyz\Zed\Glossary\GlossaryConfig;
use Spryker\Shared\CmsBlock\CmsBlockConfig;
use Spryker\Shared\CmsBlockCategoryConnector\CmsBlockCategoryConnectorConstants;
use Spryker\Shared\CmsBlockProductConnector\CmsBlockProductConnectorConstants;
use Spryker\Zed\CmsBlock\Business\Model\CmsBlockGlossaryKeyGenerator;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

/**
 * @SuppressWarnings(PHPMD)
 */
class CmsBlockWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_BLOCK_NAME = 'block_name';
    const KEY_BLOCK_TYPE = 'type';
    const KEY_BLOCK_VALUE = 'value';
    const KEY_TEMPLATE_NAME = 'template_name';
    const KEY_TEMPLATE_PATH = 'template_path';
    const KEY_CATEGORIES = 'categories';
    const KEY_PRODUCTS = 'products';
    const KEY_ACTIVE = 'active';
    const KEY_PLACEHOLDER_TITLE = 'placeholder.title';
    const KEY_PLACEHOLDER_DESCRIPTION = 'placeholder.description';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface $categoryRepository
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface $productRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param null|int $bulkSize
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        DataImportToTouchInterface $touchFacade,
        $bulkSize = null
    ) {
        parent::__construct($touchFacade, $bulkSize);

        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $templateEntity = $this->findOrCreateCmsBlockTemplate($dataSet);
        $cmsBlockEntity = $this->findOrCreateCmsBlock($dataSet, $templateEntity);

        $this->findOrCreateCmsBlockToCategoryRelation($dataSet, $cmsBlockEntity);
        $this->findOrCreateCmsBlockToProductRelation($dataSet, $cmsBlockEntity);

        $this->findOrCreateCmsBlockPlaceholderTranslation($dataSet, $cmsBlockEntity);

        $this->addMainTouchable(CmsBlockConfig::RESOURCE_TYPE_CMS_BLOCK, $cmsBlockEntity->getIdCmsBlock());
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockTemplate
     */
    protected function findOrCreateCmsBlockTemplate(DataSetInterface $dataSet)
    {
        $templateEntity = SpyCmsBlockTemplateQuery::create()
            ->filterByTemplateName($dataSet[static::KEY_TEMPLATE_NAME])
            ->findOneOrCreate();

        $templateEntity->setTemplatePath($dataSet[static::KEY_TEMPLATE_PATH]);

        if ($templateEntity->isNew() || $templateEntity->isModified()) {
            $templateEntity->save();
        }

        return $templateEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockTemplate $templateEntity
     *
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlock
     */
    protected function findOrCreateCmsBlock(DataSetInterface $dataSet, SpyCmsBlockTemplate $templateEntity)
    {
        $cmsBlockEntity = SpyCmsBlockQuery::create()
            ->filterByFkTemplate($templateEntity->getIdCmsBlockTemplate())
            ->filterByName($dataSet[static::KEY_BLOCK_NAME])
            ->findOneOrCreate();

        $cmsBlockEntity->setIsActive($dataSet[static::KEY_ACTIVE]);

        if ($cmsBlockEntity->isNew() || $cmsBlockEntity->isModified()) {
            $cmsBlockEntity->save();
        }

        return $cmsBlockEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\CmsBlock\Persistence\SpyCmsBlock $cmsBlockEntity
     *
     * @return void
     */
    protected function findOrCreateCmsBlockToCategoryRelation(DataSetInterface $dataSet, SpyCmsBlock $cmsBlockEntity)
    {
        if (!empty($dataSet[static::KEY_CATEGORIES])) {
            $categoryKeys = explode(',', $dataSet[static::KEY_CATEGORIES]);
            foreach ($categoryKeys as $categoryKey) {
                $idCategory = $this->categoryRepository->getIdCategoryByCategoryKey(trim($categoryKey));
                $cmsBlockCategoryConnectorEntity = SpyCmsBlockCategoryConnectorQuery::create()
                    ->filterByFkCmsBlock($cmsBlockEntity->getIdCmsBlock())
                    ->filterByFkCategory($idCategory)
                    ->findOneOrCreate();

                if ($cmsBlockCategoryConnectorEntity->isNew() || $cmsBlockCategoryConnectorEntity->isModified()) {
                    $cmsBlockCategoryConnectorEntity->save();

                    $this->addSubTouchable(CmsBlockCategoryConnectorConstants::RESOURCE_TYPE_CMS_BLOCK_CATEGORY_CONNECTOR, $idCategory);
                }
            }
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\CmsBlock\Persistence\SpyCmsBlock $cmsBlockEntity
     *
     * @return void
     */
    protected function findOrCreateCmsBlockToProductRelation(DataSetInterface $dataSet, SpyCmsBlock $cmsBlockEntity)
    {
        if (!empty($dataSet[static::KEY_PRODUCTS])) {
            $productAbstractSkus = explode(',', $dataSet[static::KEY_PRODUCTS]);
            foreach ($productAbstractSkus as $productAbstractSku) {
                $idProductAbstract = $this->productRepository->getIdProductAbstractByAbstractSku(trim($productAbstractSku));
                $cmsBlockProductConnectorEntity = SpyCmsBlockProductConnectorQuery::create()
                    ->filterByFkCmsBlock($cmsBlockEntity->getIdCmsBlock())
                    ->filterByFkProductAbstract($idProductAbstract)
                    ->findOneOrCreate();

                if ($cmsBlockProductConnectorEntity->isNew() || $cmsBlockProductConnectorEntity->isModified()) {
                    $cmsBlockProductConnectorEntity->save();

                    $this->addSubTouchable(CmsBlockProductConnectorConstants::RESOURCE_TYPE_CMS_BLOCK_PRODUCT_CONNECTOR, $idProductAbstract);
                }
            }
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\CmsBlock\Persistence\SpyCmsBlock $cmsBlockEntity
     *
     * @return void
     */
    protected function findOrCreateCmsBlockPlaceholderTranslation(DataSetInterface $dataSet, SpyCmsBlock $cmsBlockEntity)
    {
        foreach ($dataSet[LocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $placeholder) {
            foreach ($placeholder as $key => $value) {
                $key = str_replace('placeholder.', '', $key);
                $keyName = CmsBlockGlossaryKeyGenerator::GENERATED_GLOSSARY_KEY_PREFIX . '.';
                $keyName .= str_replace([' ', '.'], '-', $dataSet[static::KEY_TEMPLATE_NAME]) . '.';
                $keyName .= str_replace([' ', '.'], '-', $key);
                $keyName .= '.idCmsBlock.' . $cmsBlockEntity->getIdCmsBlock();
                $keyName .= '.uniqueId.1';

                $glossaryKeyEntity = SpyGlossaryKeyQuery::create()
                    ->filterByKey($keyName)
                    ->findOneOrCreate();

                if ($glossaryKeyEntity->isNew() || $glossaryKeyEntity->isModified()) {
                    $glossaryKeyEntity->save();
                }

                $glossaryTranslationEntity = SpyGlossaryTranslationQuery::create()
                    ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                    ->filterByFkLocale($idLocale)
                    ->findOneOrCreate();

                $glossaryTranslationEntity->setValue($value);

                if ($glossaryTranslationEntity->isNew() || $glossaryTranslationEntity->isModified()) {
                    $glossaryTranslationEntity->save();
                }

                $pageKeyMappingEntity = SpyCmsBlockGlossaryKeyMappingQuery::create()
                    ->filterByFkGlossaryKey($glossaryKeyEntity->getIdGlossaryKey())
                    ->filterByFkCmsBlock($cmsBlockEntity->getIdCmsBlock())
                    ->findOneOrCreate();

                $pageKeyMappingEntity->setPlaceholder($key);

                if ($pageKeyMappingEntity->isNew() || $pageKeyMappingEntity->isModified()) {
                    $pageKeyMappingEntity->save();
                }

                $this->addSubTouchable(GlossaryConfig::RESOURCE_TYPE_TRANSLATION, $glossaryTranslationEntity->getIdGlossaryTranslation());
            }
        }
    }

}
