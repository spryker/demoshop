<?php
namespace Pyz\Zed\Installer\Business\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

interface IcecatImporterInterface
{

    /**
     * @param array $columns
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $columns, array $data);

    /**
     * @return bool
     */
    public function isImported();

    /**
     * @return void
     */
    public function beforeImport();

    /**
     * @return void
     */
    public function afterImport();

}
