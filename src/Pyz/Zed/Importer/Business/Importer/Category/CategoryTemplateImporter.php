<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Orm\Zed\Category\Persistence\SpyCategoryTemplate;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

class CategoryTemplateImporter extends AbstractImporter
{

    const FIELD_NAME = 'template_name';
    const FIELD_PATH = 'template_path';

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(LocaleFacadeInterface $localeFacade, CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
        parent::__construct($localeFacade);
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return $this->categoryQueryContainer->queryCategoryTemplate()->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Template';
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data)
    {
        $spyCategoryTemplate = new SpyCategoryTemplate();
        $spyCategoryTemplate->setName($data[static::FIELD_NAME]);
        $spyCategoryTemplate->setTemplatePath($data[static::FIELD_PATH]);
        $spyCategoryTemplate->save();
    }

}
