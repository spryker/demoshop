<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager;
use Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface;

class CategoryImporter extends AbstractIcecatImporter
{

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @param \Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface $csvReader
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager $localeManager
     * @param CategoryFacade $categoryFacade
     */
    public function __construct(CsvReaderInterface $csvReader, IcecatLocaleManager $localeManager, CategoryFacade $categoryFacade)
    {
        parent::__construct($csvReader, $localeManager);
        $this->categoryFacade = $categoryFacade;
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
