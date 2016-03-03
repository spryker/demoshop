<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Spryker\Shared\Library\BatchIterator\XmlBatchIterator;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class CmsBlockInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new XmlBatchIterator($this->getXmlDataFilename(), 'block');
    }

    /**
     * @return string
     */
    protected function getXmlDataFilename()
    {
        return $this->dataDirectory . '/cms_blocks.xml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Blocks';
    }

}
