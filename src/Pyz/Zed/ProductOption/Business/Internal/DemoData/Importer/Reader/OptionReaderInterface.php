<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

interface OptionReaderInterface
{

    /**
     * @return \Generator
     */
    public function getOptions();

}
