<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\WriterProvider;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductMediaWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductWriter;

class PetsDeliWriterProvider implements ProductWriterProviderInterface
{
    protected $abstractProductWriter;


    public function __construct(
        AbstractProductWriter $abstractProductWriter
    ) {
        $this->abstractProductWriter = $abstractProductWriter;

    }

    /**
     * @return ProductWriterInterface[]
     */
    public function getWriter()
    {

        return [
            $this->abstractProductWriter,
        ];





    }
}