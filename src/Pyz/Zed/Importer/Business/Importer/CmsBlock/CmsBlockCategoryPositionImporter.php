<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\CmsBlock;

use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryPosition;
use Orm\Zed\CmsBlockCategoryConnector\Persistence\SpyCmsBlockCategoryPositionQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\CmsBlockCategoryConnector\Persistence\CmsBlockCategoryConnectorQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CmsBlockCategoryPositionImporter extends AbstractImporter
{

    const FIELD_POSITION_NAME = 'block_category_position_name';

    /**
     * @var \Spryker\Zed\CmsBlockCategoryConnector\Persistence\CmsBlockCategoryConnectorQueryContainerInterface
     */
    protected $cmsBlockCategoryConnectorQueryContainer;

    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CmsBlockCategoryConnectorQueryContainerInterface $cmsBlockCategoryConnectorQueryContainer
    ) {
        $this->cmsBlockCategoryConnectorQueryContainer = $cmsBlockCategoryConnectorQueryContainer;
        parent::__construct($localeFacade);
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyCmsBlockCategoryPositionQuery::create();

        return $query->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Block Category Position';
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data)
    {
        $spyCmsBlockCategoryPosition = new SpyCmsBlockCategoryPosition();
        $spyCmsBlockCategoryPosition->setName($data[static::FIELD_POSITION_NAME]);
        $spyCmsBlockCategoryPosition->save();
    }

}
