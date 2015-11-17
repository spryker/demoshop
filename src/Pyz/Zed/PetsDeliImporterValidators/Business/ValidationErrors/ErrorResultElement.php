<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors;

class ErrorResultElement implements ErrorResultElementInterface
{
    private $message;

    /**
     * @param $sku
     * @param $message
     */
    public function __construct($sku, $message)
    {
        $this->message = '[sku:' . $sku . '] ' . $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
