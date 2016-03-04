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
     * @var \Pyz\Zed\Installer\Business\Icecat\Processor\IcecatProcessorInterface[]
     */
    protected $processorCollection = [];

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
     * @param array $processorCollection
     */
    public function __construct(IcecatLocaleManager $localeManager, array $processorCollection = [])
    {
        $this->localeManager = $localeManager;
        $this->processorCollection = $processorCollection;
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
     * @param array $data
     *
     * @return array
     */
    protected function process(array $data)
    {
        foreach ($this->processorCollection as $processor) {
            $data = $processor->process($data);
        }

        return $data;
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
        $data = $this->process($data);
        $this->importOne($data);
    }

}
