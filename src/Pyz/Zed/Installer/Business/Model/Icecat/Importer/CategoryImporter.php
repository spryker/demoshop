<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatReaderInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class CategoryImporter extends AbstractIcecatImporter
{

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * IcecatInstaller constructor.
     */
    public function __construct(IcecatReaderInterface $xmlReader, CategoryFacade $categoryFacade)
    {
        parent::__construct($xmlReader);
        $this->categoryFacade = $categoryFacade;
    }

}
