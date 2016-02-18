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
     * @return bool
     */
    public function canImport()
    {
        return true;

        return count($this->categoryFacade->getRootNodes()) === 0;
    }

    /**
     * @return string
     */
    protected function getColumnHeader()
    {
        return 'catid,ucatid,pcatid,low_pic,category_name.en_EN,category_description.en_EN,category_name.de_DE,category_description.de_DE,category_name.fr_FR,category_description.fr_FR';
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale $icecatLocale
     *
     * @return void
     */
    protected function importData(LocaleTransfer $localeTransfer, IcecatLocale $icecatLocale)
    {
        $csvFile = $this->getCsvFile('__categories_done.csv');

        while (!$csvFile->eof()) {
            $category = $this->format($csvFile->fgetcsv());

            dump($category);
            break;
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        $categoryData = $this->generateCsvItem($data);

        return $categoryData;
    }

}
