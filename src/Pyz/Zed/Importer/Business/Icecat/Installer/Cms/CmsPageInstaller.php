<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat\Installer\Cms;

use Pyz\Zed\Importer\Business\Icecat\Installer\AbstractIcecatInstaller;
use Spryker\Shared\Library\BatchIterator\XmlBatchIterator;

class CmsPageInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new XmlBatchIterator($this->getXmlDataFilename(), 'page');
    }

    /**
     * @return string
     */
    protected function getXmlDataFilename()
    {
        return $this->dataDirectory . '/cms_pages.xml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Pages';
    }

}
