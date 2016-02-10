<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatImporter
{

    /**
     * @var IcecatReaderInterface
     */
    protected $xmlReader;

    /**
     * @param string $locale
     *
     * @return void
     */
    abstract public function import($locale);

    /**
     * IcecatInstaller constructor.
     */
    public function __construct(IcecatReaderInterface $xmlReader)
    {
        $this->xmlReader = $xmlReader;
    }

}
