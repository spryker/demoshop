<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category;

use Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CategoryWriterStep implements DataImportStepInterface
{

    const TOUCH_ITEM_TYPE_KEY = 'touchItemType';
    const TOUCH_ITEM_ID_KEY = 'touchItemId';

    /**
     * @var array
     */
    protected $savedCategories = [];

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
        if (!isset($this->savedCategories[$dataSetArrayCopy['category_key']])) {
            $query = SpyCategoryQuery::create();
            $categoryEntity = $query
                ->filterByCategoryKey($dataSetArrayCopy['category_key'])
                ->findOneOrCreate();

            $categoryEntity->fromArray($dataSetArrayCopy);
            $categoryEntity->save();

            $this->savedCategories[$dataSetArrayCopy['category_key']] = $categoryEntity->getIdCategory();
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
            ->filterByFkCategory($this->savedCategories[$dataSetArrayCopy['category_key']])
            ->filterByFkLocale($dataSetArrayCopy['idLocale'])
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
            ->filterByFkCategory($this->savedCategories[$dataSetArrayCopy['category_key']])
            ->findOneOrCreate();

        if (!empty($dataSet['parent_category_key'])) {
            if (!isset($this->savedCategories[$dataSet['parent_category_key']])) {
                throw new CategoryByKeyNotFoundException(sprintf(
                    'Category by key "%s" not found. Check if the category is already saved. Saved Categories: "%s"',
                    $dataSet['parent_category_key'],
                    implode('', array_keys($this->savedCategories))
                ));
            }
            $categoryNodeEntity->setFkParentCategoryNode($this->savedCategories[$dataSet['parent_category_key']]);
        }

        $categoryNodeEntity->fromArray($dataSetArrayCopy);
        $categoryNodeEntity->save();

        if ($categoryNodeEntity->isRoot()) {
            $dataSet[static::TOUCH_ITEM_TYPE_KEY] = CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE;
            $dataSet[static::TOUCH_ITEM_ID_KEY] = $categoryNodeEntity->getIdCategoryNode();
        }
    }

}
