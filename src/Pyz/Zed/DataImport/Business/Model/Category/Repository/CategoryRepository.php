<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Category\Repository;

use ArrayObject;
use Orm\Zed\Category\Persistence\SpyCategory;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\DataImport\Business\Exception\CategoryByKeyNotFoundException;

class CategoryRepository
{

    const ID_LOCALE = 'idLocale';
    const URL = 'url';

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
     *
     * @return void
     */
    public function addCategory(SpyCategory $categoryEntity)
    {
        $this->categoryKeys[$categoryEntity->getCategoryKey()] = $categoryEntity->getIdCategory();

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

        return $this->categoryKeys[$categoryKey];
    }

    /**
     * @return void
     */
    private function loadCategoryKeys()
    {
        $categoryNodeEntityCollection = SpyCategoryNodeQuery::create()->joinWithCategory()->find();

        foreach ($categoryNodeEntityCollection as $categoryNodeEntity) {
            $this->categoryKeys[$categoryNodeEntity->getCategory()->getCategoryKey()] = $categoryNodeEntity->getIdCategoryNode();
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
