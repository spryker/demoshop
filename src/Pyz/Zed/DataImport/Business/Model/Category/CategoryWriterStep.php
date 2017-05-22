<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category;

use Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException;
use Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface;
use Spryker\Zed\Category\CategoryConfig;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Url\UrlConfig;

class CategoryWriterStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    const TOUCH_ITEM_TYPE_KEY_CATEGORY = 'touchItemTypeCategory';
    const TOUCH_ITEM_ID_KEY_CATEGORY = 'touchItemIdCategory';

    const TOUCH_ITEM_TYPE_KEY_URL = 'touchItemTypeUrl';
    const TOUCH_ITEM_ID_KEY_URL = 'touchItemIdUrl';

    const DATA_SET_KEY_CATEGORY_KEY = 'category_key';
    const DATA_SET_KEY_PARENT_CATEGORY_KEY = 'parent_category_key';

    /**
     * @var \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface
     */
    protected $urlPathGenerator;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQuery;

    /**
     * @var array
     */
    protected $savedCategories = [];

    /**
     * @param \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface $urlPathGenerator
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQuery
     */
    public function __construct(UrlPathGeneratorInterface $urlPathGenerator, CategoryQueryContainerInterface $categoryQuery)
    {
        $this->urlPathGenerator = $urlPathGenerator;
        $this->categoryQuery = $categoryQuery;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $dataSetArrayCopy = $dataSet->getArrayCopy();

        $this->saveCategory($dataSetArrayCopy);
        $this->saveCategoryAttribute($dataSetArrayCopy);
        $this->saveCategoryNode($dataSetArrayCopy, $dataSet);
    }

    /**
     * @param array $dataSetArrayCopy
     *
     * @return void
     */
    protected function saveCategory(array $dataSetArrayCopy)
    {
        if (!isset($this->savedCategories[$dataSetArrayCopy[self::DATA_SET_KEY_CATEGORY_KEY]])) {
            $query = SpyCategoryQuery::create();
            $categoryEntity = $query
                ->filterByCategoryKey($dataSetArrayCopy[self::DATA_SET_KEY_CATEGORY_KEY])
                ->findOneOrCreate();

            $categoryEntity->fromArray($dataSetArrayCopy);
            $categoryEntity->save();

            $this->savedCategories[$dataSetArrayCopy[self::DATA_SET_KEY_CATEGORY_KEY]] = $categoryEntity->getIdCategory();
        }
    }

    /**
     * @param array $dataSetArrayCopy
     *
     * @return void
     */
    protected function saveCategoryAttribute(array $dataSetArrayCopy)
    {
        $query = SpyCategoryAttributeQuery::create();
        $categoryAttributeEntity = $query
            ->filterByFkCategory($this->savedCategories[$dataSetArrayCopy[self::DATA_SET_KEY_CATEGORY_KEY]])
            ->filterByFkLocale($dataSetArrayCopy[LocaleNameToIdLocaleStep::KEY_TARGET])
            ->findOneOrCreate();

        $categoryAttributeEntity->fromArray($dataSetArrayCopy);
        $categoryAttributeEntity->save();
    }

    /**
     * @param array $dataSetArrayCopy
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException
     *
     * @return void
     */
    protected function saveCategoryNode(array $dataSetArrayCopy, DataSetInterface $dataSet)
    {
        $query = SpyCategoryNodeQuery::create();
        $categoryNodeEntity = $query
            ->filterByFkCategory($this->savedCategories[$dataSetArrayCopy[self::DATA_SET_KEY_CATEGORY_KEY]])
            ->findOneOrCreate();

        if (!empty($dataSet[self::DATA_SET_KEY_PARENT_CATEGORY_KEY])) {
            if (!isset($this->savedCategories[$dataSet[self::DATA_SET_KEY_PARENT_CATEGORY_KEY]])) {
                throw new CategoryByKeyNotFoundException(sprintf(
                    'Category by key "%s" not found. Check if the category is already saved. Saved Categories: "%s"',
                    $dataSet[self::DATA_SET_KEY_PARENT_CATEGORY_KEY],
                    implode('', array_keys($this->savedCategories))
                ));
            }
            $categoryNodeEntity->setFkParentCategoryNode($this->savedCategories[$dataSet[self::DATA_SET_KEY_PARENT_CATEGORY_KEY]]);
        }

        $categoryNodeEntity->fromArray($dataSetArrayCopy);
        $categoryNodeEntity->save();

        if ($categoryNodeEntity->isRoot()) {
            $dataSet[static::TOUCH_ITEM_TYPE_KEY_CATEGORY] = CategoryConfig::RESOURCE_TYPE_NAVIGATION;
            $dataSet[static::TOUCH_ITEM_ID_KEY_CATEGORY] = $categoryNodeEntity->getIdCategoryNode();
        }

        $idLocale = $dataSetArrayCopy[LocaleNameToIdLocaleStep::KEY_TARGET];
        $idCategoryNode = $categoryNodeEntity->getIdCategoryNode();
        $urlPathParts = $this->categoryQuery->queryPath($idCategoryNode, $idLocale)->find();
        $languageIdentifier = $this->getLanguageIdentifierFromLocale($dataSet['localeName']);
        array_unshift(
            $urlPathParts,
            [
                UrlPathGenerator::CATEGORY_NAME => $languageIdentifier,
            ]
        );
        $url = $this->urlPathGenerator->generate($urlPathParts);

        $query = SpyUrlQuery::create();
        $urlEntity = $query
            ->filterByFkLocale($idLocale)
            ->filterByFkResourceCategorynode($idCategoryNode)
            ->findOneOrCreate();

        $urlEntity->setUrl($url);
        $urlEntity->save();

        $dataSet[static::TOUCH_ITEM_TYPE_KEY_URL] = UrlConfig::RESOURCE_TYPE_URL;
        $dataSet[static::TOUCH_ITEM_ID_KEY_URL] = $urlEntity->getIdUrl();
    }

    /**
     * @param string $localeName
     *
     * @return string
     */
    protected function getLanguageIdentifierFromLocale($localeName)
    {
        return mb_substr($localeName, 0, 2);
    }

}
