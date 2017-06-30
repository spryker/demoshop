<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category\Repository;

use ArrayObject;
use Orm\Zed\Category\Persistence\SpyCategory;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException;

class CategoryRepository implements CategoryRepositoryInterface
{

    const ID_CATEGORY_NODE = 'id_category_node';
    const ID_LOCALE = 'idLocale';
    const URL = 'url';
    const ID_CATEGORY = 'id_category';

    /**
     * @var \ArrayObject
     */
    protected $categoryKeys;

    /**
     * @var \ArrayObject
     */
    protected $categoryUrls;

    public function __construct()
    {
        $this->categoryKeys = new ArrayObject();
        $this->categoryUrls = new ArrayObject();
    }

    /**
     * @param string $categoryKey
     *
     * @return bool
     */
    public function hasCategory($categoryKey)
    {
        if ($this->categoryKeys->count() === 0) {
            $this->loadCategoryKeys();
        }

        return $this->categoryKeys->offsetExists($categoryKey);
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategory $categoryEntity
     * @param \Orm\Zed\Category\Persistence\SpyCategoryNode $categoryNodeEntity
     *
     * @return void
     */
    public function addCategory(SpyCategory $categoryEntity, SpyCategoryNode $categoryNodeEntity)
    {
        $this->categoryKeys[$categoryEntity->getCategoryKey()] = [
            static::ID_CATEGORY => $categoryEntity->getIdCategory(),
            static::ID_CATEGORY_NODE => $categoryNodeEntity->getIdCategoryNode(),
        ];

        $urls = [];
        $categoryNodeEntityCollection = $categoryEntity->getNodes();
        foreach ($categoryNodeEntityCollection as $categoryNode) {
            foreach ($categoryNode->getSpyUrls() as $urlEntity) {
                $urls[] = [
                    static::ID_LOCALE => $urlEntity->getFkLocale(),
                    static::URL => $urlEntity->getUrl(),
                ];
            }
        }

        $this->categoryUrls[$categoryEntity->getCategoryKey()] = $urls;
    }

    /**
     * @param string $categoryKey
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException
     *
     * @return int
     */
    public function getIdCategoryNodeByCategoryKey($categoryKey)
    {
        if ($this->categoryKeys->count() === 0) {
            $this->loadCategoryKeys();
        }

        if (!$this->categoryKeys->offsetExists($categoryKey)) {
            throw new CategoryByKeyNotFoundException(sprintf(
                'Category by key "%s" not found. Maybe you have a typo in the category key.',
                $categoryKey
            ));
        }

        return $this->categoryKeys[$categoryKey][static::ID_CATEGORY_NODE];
    }

    /**
     * @param string $categoryKey
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException
     *
     * @return int
     */
    public function getIdCategoryByCategoryKey($categoryKey)
    {
        if ($this->categoryKeys->count() === 0) {
            $this->loadCategoryKeys();
        }

        if (!$this->categoryKeys->offsetExists($categoryKey)) {
            throw new CategoryByKeyNotFoundException(sprintf(
                'Category by key "%s" not found. Maybe you have a typo in the category key.',
                $categoryKey
            ));
        }

        return $this->categoryKeys[$categoryKey][static::ID_CATEGORY];
    }

    /**
     * @return void
     */
    private function loadCategoryKeys()
    {
        $categoryEntityCollection = SpyCategoryQuery::create()
            ->joinWithNode()
            ->find();

        foreach ($categoryEntityCollection as $categoryEntity) {
            $this->categoryKeys[$categoryEntity->getCategoryKey()] = [
                static::ID_CATEGORY => $categoryEntity->getIdCategory(),
                static::ID_CATEGORY_NODE => $categoryEntity->getNodes()->getFirst()->getIdCategoryNode(),
            ];
        }
    }

    /**
     * @param string $categoryKey
     * @param int $idLocale
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException
     *
     * @return string
     */
    public function getParentUrl($categoryKey, $idLocale)
    {
        if ($this->categoryUrls->count() === 0) {
            $this->loadCategoryUrls();
        }

        if (!$this->categoryUrls->offsetExists($categoryKey)) {
            throw new CategoryByKeyNotFoundException(sprintf(
                'Category url key "%s" not found. Maybe you have a typo in the category key.',
                $categoryKey
            ));
        }

        foreach ($this->categoryUrls[$categoryKey] as $categoryUrl) {
            if ($categoryUrl[static::ID_LOCALE] === $idLocale) {
                return $categoryUrl[static::URL];
            }
        }

        throw new CategoryByKeyNotFoundException(sprintf(
            'Category url key "%s" and idLocale "%s" not found.',
            $categoryKey,
            $idLocale
        ));
    }

    /**
     * @return void
     */
    private function loadCategoryUrls()
    {
        $urlEntityCollection = SpyUrlQuery::create()->filterByFkResourceCategorynode(null, Criteria::ISNOTNULL)->find();

        foreach ($urlEntityCollection as $urlEntity) {
            $categoryEntity = $urlEntity->getSpyCategoryNode()->getCategory();
            if (!$this->categoryUrls->offsetExists($categoryEntity->getCategoryKey())) {
                $this->categoryUrls[$categoryEntity->getCategoryKey()] = [];
            }
            $this->categoryUrls[$categoryEntity->getCategoryKey()][] = [
                static::ID_LOCALE => $urlEntity->getFkLocale(),
                static::URL => $urlEntity->getUrl(),
            ];
        }
    }

}
