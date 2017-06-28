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
use Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepository;
use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Spryker\Zed\Category\CategoryConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Url\UrlConfig;

/**
 * @SuppressWarnings(PHPMD)
 */
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
     * @var \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepository $categoryRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     */
    public function __construct(CategoryRepository $categoryRepository, DataImportToTouchInterface $touchFacade)
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
        $categoryEntity = $this->createCategory($dataSet);
        $this->addAttributes($categoryEntity, $dataSet);
        $this->addNode($categoryEntity, $dataSet);

        $categoryEntity->save();

        $this->categoryRepository->addCategory($categoryEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategory
     */
    protected function createCategory(DataSetInterface $dataSet)
    {
        $categoryEntity = SpyCategoryQuery::create()
            ->filterByCategoryKey($dataSet[self::KEY_CATEGORY_KEY])
            ->findOneOrCreate();

        $categoryEntity->fromArray($dataSet->getArrayCopy());

        $categoryEntity->save();

        return $categoryEntity;
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategory $categoryEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    protected function addAttributes(SpyCategory $categoryEntity, DataSetInterface $dataSet)
    {
        $localizedAttributeCollection = $dataSet[ProductLocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES];
        foreach ($localizedAttributeCollection as $idLocale => $localizedAttributes) {
            $categoryAttributeEntity = SpyCategoryAttributeQuery::create()
                ->filterByCategory($categoryEntity)
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $categoryAttributeEntity->fromArray($localizedAttributes);
            $categoryAttributeEntity->save();
        }
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategory $categoryEntity
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    protected function addNode(SpyCategory $categoryEntity, DataSetInterface $dataSet)
    {
        $categoryNodeEntity = SpyCategoryNodeQuery::create()
            ->filterByCategory($categoryEntity)
            ->findOneOrCreate();

        if (!empty($dataSet[self::KEY_PARENT_CATEGORY_KEY])) {
            $idParentCategoryNode = $this->categoryRepository->getIdCategoryNodeByCategoryKey($dataSet[self::KEY_PARENT_CATEGORY_KEY]);
            $categoryNodeEntity->setFkParentCategoryNode($idParentCategoryNode);
        }

        $categoryNodeEntity->fromArray($dataSet->getArrayCopy());
        $categoryNodeEntity->save();

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

            $callback = function ($value) {
                return mb_strtolower(str_replace(' ', '-', $value));
            };
            $urlPathParts = array_map($callback, $urlPathParts);
            $url = '/' . implode('/', $urlPathParts);

            $urlEntity = SpyUrlQuery::create()
                ->filterByFkLocale($idLocale)
                ->filterByFkResourceCategorynode($categoryNodeEntity->getIdCategoryNode())
                ->findOneOrCreate();

            $urlEntity
                ->setUrl($url)
                ->save();

            $this->addSubTouchable(UrlConfig::RESOURCE_TYPE_URL, $urlEntity->getIdUrl());
        }
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
    private function addToClosureTable(SpyCategoryNode $categoryNodeEntity)
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
                    ->setDepth($categoryClosureEntity->getDepth() + 1)
                    ->save();
            }
        }

        $categoryClosureTableEntity = SpyCategoryClosureTableQuery::create()
            ->filterByFkCategoryNode($categoryNodeEntity->getIdCategoryNode())
            ->filterByFkCategoryNodeDescendant($categoryNodeEntity->getIdCategoryNode())
            ->findOneOrCreate();

        $categoryClosureTableEntity
            ->setDepth(0)
            ->save();
    }

}
