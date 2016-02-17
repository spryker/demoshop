<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Model\Reader;

use SplFileObject;

interface CsvReaderInterface
{

    /**
     * @param string $filename
     *
     * @return SplFileObject
     */
    public function getCsvIterator($filename);

}
