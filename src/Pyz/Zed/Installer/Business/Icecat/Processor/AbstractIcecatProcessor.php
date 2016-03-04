<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Processor;

use Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatProcessor implements IcecatProcessorInterface
{

    /**
     * @var \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager
     */
    protected $localeManager;

    /**
     * @param array $data
     *
     * @return array
     */
    abstract protected function processData(array $data);


    /**
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     * @param string $dataDirectory
     */
    public function __construct(IcecatLocaleManager $localeManager, $dataDirectory)
    {
        $this->localeManager = $localeManager;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @return array
     */
    public function process(array $data)
    {
        return $this->processData($data);
    }

}
