<?php
namespace Pyz\Zed\Installer\Business\Icecat\Importer;

use Symfony\Component\Console\Output\OutputInterface;

interface IcecatImporterInterface
{

    /**
     * @return void
     */
    public function afterImport();

    /**
     * @return void
     */
    public function beforeImport();

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data);

    /**
     * @return bool
     */
    public function isImported();

    /**
     * @return string
     */
    public function getTitle();

}
