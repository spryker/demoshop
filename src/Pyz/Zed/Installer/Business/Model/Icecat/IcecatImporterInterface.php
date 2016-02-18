<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Model\Icecat;

interface IcecatImporterInterface
{

    /**
     * @return void
     */
    public function import();

    /**
     * @return bool
     */
    public function canImport();

}
