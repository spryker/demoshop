<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Category;

use Generated\Shared\Transfer\CategoryLocalizedAttributesTransfer;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

abstract class AbstractCategoryImporter extends AbstractImporter
{

    const CATEGORY_KEY = 'category_key';
    const ORDER = 'order';

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

}
