<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category;

use Exception;
use Orm\Zed\Category\Persistence\SpyCategory;
use Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryClosureTableQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface;
use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Spryker\Zed\Category\CategoryConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Url\UrlConfig;

class CategoryWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_NAME = 'name';
    const KEY_META_TITLE = 'meta_title';
    const KEY_META_DESCRIPTION = 'meta_description';
    const KEY_META_KEYWORDS = 'meta_keywords';
    const KEY_CATEGORY_KEY = 'category_key';
    const KEY_PARENT_CATEGORY_KEY = 'parent_category_key';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepositoryInterface $categoryRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, DataImportToTouchInterface $touchFacade)
    {
        parent::__construct($touchFacade, static::BULK_SIZE);

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $categoryEntity = $this->findOrCreateCategory($dataSet);
        $this->findOrCreateAttributes($categoryEntity, $dataSet);
        $categoryNodeEntity = $this->findOrCreateNode($categoryEntity, $dataSet);

        $this->categoryRepository->addCategory($categoryEntity, $categoryNodeEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategory
     */
    protected function findOrCreateCategory(DataSetInterface $dataSet)
    {
        $categoryEntity = SpyCategoryQuery::create()
            ->filterByCategoryKey($dataSet[static::KEY_CATEGORY_KEY])
            ->findOneOrCreate();

        $categoryEntity->fromArray($dataSet->getArrayCopy());

        if ($categoryEntity->isNew() || $categoryEntity->isModified()) {
            $categoryEntity->save();
        }

        return $categoryEntity;
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategory $categoryEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    protected function findOrCreateAttributes(SpyCategory $categoryEntity, DataSetInterface $dataSet)
    {
        $localizedAttributeCollection = $dataSet[ProductLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES];
        foreach ($localizedAttributeCollection as $idLocale => $localizedAttributes) {
            $categoryAttributeEntity = SpyCategoryAttributeQuery::create()
                ->filterByCategory($categoryEntity)
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $categoryAttributeEntity->fromArray($localizedAttributes);

            if ($categoryAttributeEntity->isNew() || $categoryAttributeEntity->isModified()) {
                $categoryAttributeEntity->save();
            }
        }
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategory $categoryEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected function findOrCreateNode(SpyCategory $categoryEntity, DataSetInterface $dataSet)
    {
        $categoryNodeEntity = SpyCategoryNodeQuery::create()
            ->filterByCategory($categoryEntity)
            ->findOneOrCreate();

        if (!empty($dataSet[static::KEY_PARENT_CATEGORY_KEY])) {
            $idParentCategoryNode = $this->categoryRepository->getIdCategoryNodeByCategoryKey($dataSet[static::KEY_PARENT_CATEGORY_KEY]);
            $categoryNodeEntity->setFkParentCategoryNode($idParentCategoryNode);
        }

        $categoryNodeEntity->fromArray($dataSet->getArrayCopy());

        if ($categoryNodeEntity->isNew() || $categoryNodeEntity->isModified()) {
            $categoryNodeEntity->save();
        }

        $this->addToClosureTable($categoryNodeEntity);

        $this->addMainTouchable(CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE, $categoryNodeEntity->getIdCategoryNode());

        if ($categoryNodeEntity->getIsRoot()) {
            $this->addSubTouchable(CategoryConfig::RESOURCE_TYPE_NAVIGATION, $categoryNodeEntity->getIdCategoryNode());
        }

        foreach ($categoryEntity->getAttributes() as $categoryAttributesEntity) {
            $idLocale = $categoryAttributesEntity->getFkLocale();
            $languageIdentifier = $this->getLanguageIdentifier($idLocale, $dataSet);
            $urlPathParts = [$languageIdentifier];
            if (!$categoryNodeEntity->getIsRoot()) {
                $parentUrl = $this->categoryRepository->getParentUrl(
                    $dataSet[static::KEY_PARENT_CATEGORY_KEY],
                    $idLocale
                );

                $urlPathParts = explode('/', ltrim($parentUrl, '/'));
                $urlPathParts[] = $categoryAttributesEntity->getName();
            }

            $convertCallback = function ($value) {
                return mb_strtolower(str_replace(' ', '-', $value));
            };
            $urlPathParts = array_map($convertCallback, $urlPathParts);
            $url = '/' . implode('/', $urlPathParts);

            $urlEntity = SpyUrlQuery::create()
                ->filterByFkLocale($idLocale)
                ->filterByFkResourceCategorynode($categoryNodeEntity->getIdCategoryNode())
                ->findOneOrCreate();

            $urlEntity
                ->setUrl($url);

            if ($urlEntity->isNew() || $urlEntity->isModified()) {
                $urlEntity->save();
                $this->addSubTouchable(UrlConfig::RESOURCE_TYPE_URL, $urlEntity->getIdUrl());
            }
        }

        return $categoryNodeEntity;
    }

    /**
     * @param int $idLocale
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function getLanguageIdentifier($idLocale, DataSetInterface $dataSet)
    {
        foreach ($dataSet[AddLocalesStep::KEY_LOCALES] as $localeName => $localeId) {
            if ($idLocale === $localeId) {
                return mb_substr($localeName, 0, 2);
            }
        }

        throw new Exception(sprintf('Could not extract language identifier for idLocale "%s"', $idLocale));
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategoryNode $categoryNodeEntity
     *
     * @return void
     */
    protected function addToClosureTable(SpyCategoryNode $categoryNodeEntity)
    {
        if ($categoryNodeEntity->getFkParentCategoryNode() !== null) {
            $categoryClosureEntityCollection = SpyCategoryClosureTableQuery::create()
                ->findByFkCategoryNodeDescendant($categoryNodeEntity->getFkParentCategoryNode());

            foreach ($categoryClosureEntityCollection as $categoryClosureEntity) {
                $newCategoryClosureTableEntity = SpyCategoryClosureTableQuery::create()
                    ->filterByFkCategoryNode($categoryClosureEntity->getFkCategoryNode())
                    ->filterByFkCategoryNodeDescendant($categoryNodeEntity->getIdCategoryNode())
                    ->findOneOrCreate();

                $newCategoryClosureTableEntity
                    ->setDepth($categoryClosureEntity->getDepth() + 1);

                if ($newCategoryClosureTableEntity->isNew() || $newCategoryClosureTableEntity->isModified()) {
                    $newCategoryClosureTableEntity->save();
                }
            }
        }

        $categoryClosureTableEntity = SpyCategoryClosureTableQuery::create()
            ->filterByFkCategoryNode($categoryNodeEntity->getIdCategoryNode())
            ->filterByFkCategoryNodeDescendant($categoryNodeEntity->getIdCategoryNode())
            ->findOneOrCreate();

        $categoryClosureTableEntity
            ->setDepth(0);

        if ($categoryClosureTableEntity->isNew() || $categoryClosureTableEntity->isModified()) {
            $categoryClosureTableEntity->save();
        }
    }

}
