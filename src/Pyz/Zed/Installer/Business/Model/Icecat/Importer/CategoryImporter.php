<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale;

class CategoryImporter extends AbstractIcecatImporter
{

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacade $categoryFacade
     */
    public function setCategoryFacade(CategoryFacade $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @return string
     */
    protected function getColumnHeader()
    {
        return 'id,name';
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale $icecatLocale
     *
     * @return void
     */
    protected function importData(LocaleTransfer $localeTransfer, IcecatLocale $icecatLocale)
    {
    }

}
