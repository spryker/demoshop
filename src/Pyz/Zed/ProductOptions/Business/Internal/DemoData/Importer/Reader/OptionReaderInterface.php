<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Reader;

interface OptionReaderInterface
{

    /**
     * @yreturn OptionType[]
     */
    public function getOptions();
}
