<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\WriterProvider;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\ConcreteProductWriter;

class PetsDeliWriterProvider implements ProductWriterProviderInterface
{
    protected $abstractProductWriter;


    public function __construct(
        AbstractProductWriter $abstractProductWriter,
        ConcreteProductWriter $concreteProductWriter
    ) {
        $this->abstractProductWriter = $abstractProductWriter;
        $this->concreteProductWriter = $concreteProductWriter;

    }

    /**
     * @return ProductWriterInterface[]
     */
    public function getWriter()
    {

        return [
            $this->abstractProductWriter,
            $this->concreteProductWriter
        ];


    }
}