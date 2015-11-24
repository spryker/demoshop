<?php

namespace Pyz\Zed\CategoryCmsConnector\Business\Internal;

use Pyz\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer;
use Pyz\Zed\Cms\Business\CmsFacade;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class CategoryCmsInstaller extends AbstractInstaller
{
    const PAGE_URL = 'page_url';
    const CATEGORY_NAME = 'category_name';
    /**
     * @var CmsFacade
     */
    protected $cmsFacade;

    /**
     * @var CategoryCmsConnectorQueryContainer
     */
    protected $queryContainer;

    /**
     * @param CmsFacade $cmsFacade
     * @param CategoryCmsConnectorQueryContainer $queryContainer
     */
    public function __construct(
        CmsFacade $cmsFacade,
        CategoryCmsConnectorQueryContainer $queryContainer
    ) {
        $this->cmsFacade = $cmsFacade;
        $this->queryContainer = $queryContainer;
    }

    public function install()
    {
        $this->info('This will connect some cms-pages with category nodes.');
        $categoryCmsData = $this->getCategoryCmsData();
        foreach ($categoryCmsData as $pageCategory) {
            $this->setCategoryForPage($pageCategory);
        }
    }

    /**
     * @return array
     */
    protected function getCategoryCmsData()
    {
        return [
            [
                self::PAGE_URL => '/hunde',
                self::CATEGORY_NAME => 'Hunde',
            ]
        ];
    }

    /**
     * @param array $pageCategory
     */
    protected function setCategoryForPage(array $pageCategory)
    {
        $page = $this->queryContainer
            ->queryPageByUrlPath($pageCategory[self::PAGE_URL])
            ->findOne()
        ;

        $categoryNode = $this->queryContainer
            ->queryNodeByCategoryName($pageCategory[self::CATEGORY_NAME])
            ->findOne()
        ;

        if ($page !== null && $categoryNode !== null) {
            $page->setCategoryNode($categoryNode);

            $page->save();
        }
    }

}
