<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\CmsBlock;

use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryConnector;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface;
use Spryker\Zed\CmsBlockCategoryConnector\Persistence\CmsBlockCategoryConnectorQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CmsBlockCategoryConnectorImporter extends AbstractImporter
{

    const FIELD_BLOCK_NAME = 'block_name';
    const FIELD_CATEGORY_KEY = 'category_key';
    const FIELD_CATEGORY_TEMPLATE_NAME = 'template_name';
    const FIELD_POSITION_NAME = 'block_category_position_name';

    /**
     * @var \Spryker\Zed\CmsBlockCategoryConnector\Persistence\CmsBlockCategoryConnectorQueryContainerInterface
     */
    protected $cmsBlockCategoryConnectorQueryContainer;

    /**
     * @var \Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface
     */
    protected $cmsBlockQueryContainer;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\CmsBlockCategoryConnector\Persistence\CmsBlockCategoryConnectorQueryContainerInterface $cmsBlockCategoryConnectorQueryContainer
     * @param \Spryker\Zed\CmsBlock\Persistence\CmsBlockQueryContainerInterface $cmsBlockQueryContainer
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CmsBlockCategoryConnectorQueryContainerInterface $cmsBlockCategoryConnectorQueryContainer,
        CmsBlockQueryContainerInterface $cmsBlockQueryContainer,
        CategoryQueryContainerInterface $categoryQueryContainer
    ) {
        $this->cmsBlockCategoryConnectorQueryContainer = $cmsBlockCategoryConnectorQueryContainer;
        $this->cmsBlockQueryContainer = $cmsBlockQueryContainer;
        $this->categoryQueryContainer = $categoryQueryContainer;
        parent::__construct($localeFacade);
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = $this->cmsBlockCategoryConnectorQueryContainer->queryCmsBlockCategoryConnector();

        return $query->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Block Category Connector';
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data)
    {
        if (empty($data)) {
            return;
        }

        $spyCmsBlock = $this->cmsBlockQueryContainer->queryCmsBlockWithTemplate()
            ->filterByName($data[static::FIELD_BLOCK_NAME])
            ->findOne();

        $spyCategory = $this->categoryQueryContainer
            ->queryCategoryByKey($data[static::FIELD_CATEGORY_KEY])
            ->findOne();

        $spyCategoryTemplate = $this->categoryQueryContainer
            ->queryCategoryTemplateByName($data[static::FIELD_CATEGORY_TEMPLATE_NAME])
            ->findOne();

        $spyCmsBlockCategoryPosition = $this->cmsBlockCategoryConnectorQueryContainer
            ->queryCmsBlockCategoryPositionByName($data[static::FIELD_POSITION_NAME])
            ->findOne();

        $spyCmsBlockCategoryConnector = new SpyCmsBlockCategoryConnector();
        $spyCmsBlockCategoryConnector->setFkCmsBlock($spyCmsBlock->getIdCmsBlock());
        $spyCmsBlockCategoryConnector->setFkCategory($spyCategory->getIdCategory());
        $spyCmsBlockCategoryConnector->setFkCategoryTemplate($spyCategoryTemplate->getIdCategoryTemplate());
        $spyCmsBlockCategoryConnector->setFkCmsBlockCategoryPosition($spyCmsBlockCategoryPosition->getIdCmsBlockCategoryPosition());
        $spyCmsBlockCategoryConnector->save();
    }

}
