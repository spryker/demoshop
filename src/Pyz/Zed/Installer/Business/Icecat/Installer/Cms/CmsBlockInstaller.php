<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Installer\Cms;

use Pyz\Zed\Installer\Business\Icecat\Installer\AbstractIcecatInstaller;
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
