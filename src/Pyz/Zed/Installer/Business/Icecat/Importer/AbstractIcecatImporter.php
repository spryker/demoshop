<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Importer;

use Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager;
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
    protected $isBeforeExecuted = false;

    /**
     * @var bool
     */
    protected $isAfterExecuted = false;

    /**
     * @param array $data
     */
    abstract protected function importOne(array $data);

    /**
     * @return bool
     */
    abstract public function isImported();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * TODO Replace it with LocaleFacade
     *
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     */
    public function __construct(IcecatLocaleManager $localeManager)
    {
        $this->localeManager = $localeManager;
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
        if (!$this->isBeforeExecuted) {
            $this->before();
            $this->isBeforeExecuted = true;
        }
    }

    /**
     * @return void
     */
    public function afterImport()
    {
        if (!$this->isAfterExecuted) {
            $this->after();
            $this->isAfterExecuted = true;
        }
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function import(array $data)
    {
        $this->importOne($data);
    }

}
