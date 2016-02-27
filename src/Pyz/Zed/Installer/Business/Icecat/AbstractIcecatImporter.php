<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatImporter implements IcecatImporterInterface
{
    /**
     * @var \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager
     */
    protected $localeManager;

    /**
     * @var string
     */
    protected $columnsHeader;

    /**
     * @var bool
     */
    protected $beforeExecuted = false;

    /**
     * @var bool
     */
    protected $afterExecuted = false;

    /**
     * @param array $data
     */
    abstract public function importOne(array $data);

    /**
     * @return bool
     */
    abstract public function isImported();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     */
    public function __construct(IcecatLocaleManager $localeManager)
    {
        $this->localeManager = $localeManager;
    }

    /**
     * @param array $columns
     * @param array $data
     *
     * @return array
     */
    protected function generateCsvItem(array $columns, array $data)
    {
        return array_combine(array_values($columns), array_values($data));
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @return void
     */
    protected function before()
    {

    }

    /**
     * @return void
     */
    protected function after()
    {

    }

    /**
     * @return void
     */
    public function beforeImport()
    {
        if (!$this->beforeExecuted) {
            $this->before();
            $this->beforeExecuted = true;
        }
    }

    /**
     * @return void
     */
    public function afterImport()
    {
        if (!$this->afterExecuted) {
            $this->after();
            $this->afterExecuted = true;
        }
    }

}
