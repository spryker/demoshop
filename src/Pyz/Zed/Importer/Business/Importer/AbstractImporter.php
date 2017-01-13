<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer;

use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

abstract class AbstractImporter implements ImporterInterface
{

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacade;

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
     *
     * @return void
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
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     */
    public function __construct(LocaleFacadeInterface $localeFacade)
    {
        $this->localeFacade = $localeFacade;
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
