<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Model\Icecat;

interface IcecatImporterInterface
{

    /**
     * @param string $filename
     *
     * @return \SplFileObject
     */
    public function getCsvIterator($filename);

    /**
     * @return array
     */
    public function getColumns();

    /**
     * @return void
     */
    public function import();

}
