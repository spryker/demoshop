<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\WriterProvider;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductDynamicWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\ConcreteProductWriter;

class PetsDeliWriterProvider implements ProductWriterProviderInterface
{
    protected $abstractProductWriter;
    protected $concreteProductWriter;
    protected $abstractProductDynamicWriter;


    public function __construct(
        AbstractProductWriter $abstractProductWriter,
        ConcreteProductWriter $concreteProductWriter,
        AbstractProductDynamicWriter $abstractProductDynamicWriter
    ) {
        $this->abstractProductWriter = $abstractProductWriter;
        $this->concreteProductWriter = $concreteProductWriter;
        $this->abstractProductDynamicWriter = $abstractProductDynamicWriter;

    }

    /**
     * @return ProductWriterInterface[]
     */
    public function getWriter()
    {

        return [
            $this->abstractProductWriter,
            $this->concreteProductWriter,
            $this->abstractProductDynamicWriter,
        ];


    }
}