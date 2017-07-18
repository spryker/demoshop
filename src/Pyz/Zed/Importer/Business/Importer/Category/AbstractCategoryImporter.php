<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\CategoryLocalizedAttributesTransfer;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryTemplateQuery;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

abstract class AbstractCategoryImporter extends AbstractImporter
{

    const CATEGORY_KEY = 'category_key';
    const ORDER = 'order';
    const CATEGORY_TEMPLATE_NAME = 'template_name';

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade, CategoryFacadeInterface $categoryFacade)
    {
        parent::__construct($localeFacade);

        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function format(array $data)
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setCategoryKey($data[self::CATEGORY_KEY]);
        $categoryTransfer->setIsActive(true);
        $categoryTransfer->setIsClickable(true);
        $categoryTransfer->setIsInMenu(true);
        $categoryTransfer->setFkCategoryTemplate($this->getTemplateId($data[static::CATEGORY_TEMPLATE_NAME]));

        foreach ($this->localeFacade->getLocaleCollection() as $localeName => $localeTransfer) {
            $nameKey = 'name.' . $localeName;
            $descriptionKey = 'description.' . $localeName;

            $categoryLocalizedAttributesTransfer = new CategoryLocalizedAttributesTransfer();
            $categoryLocalizedAttributesTransfer->setName($data[$nameKey]);
            $categoryLocalizedAttributesTransfer->setLocale($localeTransfer);
            $categoryLocalizedAttributesTransfer->setMetaTitle($data[$nameKey]);
            $categoryLocalizedAttributesTransfer->setMetaDescription($data[$descriptionKey]);

            $categoryTransfer->addLocalizedAttributes($categoryLocalizedAttributesTransfer);
        }

        $categoryNodeTransfer = new NodeTransfer();
        $categoryTransfer->setCategoryNode($categoryNodeTransfer);

        $parentCategoryNodeTransfer = new NodeTransfer();
        $parentCategoryNodeTransfer->setIdCategoryNode(null);
        $categoryTransfer->setParentCategoryNode($parentCategoryNodeTransfer);

        return $categoryTransfer;
    }

    /**
     * @param string $categoryTemplateName
     *
     * @return int|null
     */
    protected function getTemplateId($categoryTemplateName)
    {
        $categoryTemplate = SpyCategoryTemplateQuery::create()
            ->filterByName($categoryTemplateName)
            ->findOne();

        return $categoryTemplate->getIdCategoryTemplate();
    }

}
