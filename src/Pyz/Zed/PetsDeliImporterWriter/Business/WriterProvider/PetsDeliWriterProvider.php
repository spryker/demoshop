<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\WriterProvider;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductDynamicWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\AbstractProductWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\ConcreteBundleProductWriter;
use Pyz\Zed\PetsDeliImporterWriter\Business\Writer\ConcreteProductWriter;

class PetsDeliWriterProvider implements ProductWriterProviderInterface
{
    /**
     * @var AbstractProductWriter
     */
    protected $abstractProductWriter;
    /**
     * @var ConcreteProductWriter
     */
    protected $concreteProductWriter;
    /**
     * @var AbstractProductDynamicWriter
     */
    protected $abstractProductDynamicWriter;
    /**
     * @var ConcreteBundleProductWriter
     */
    protected $concreteBundleProductWriter;


    public function __construct(
        AbstractProductWriter $abstractProductWriter,
        ConcreteProductWriter $concreteProductWriter,
        AbstractProductDynamicWriter $abstractProductDynamicWriter,
        ConcreteBundleProductWriter $concreteBundleProductWriter
    ) {
        $this->abstractProductWriter = $abstractProductWriter;
        $this->concreteProductWriter = $concreteProductWriter;
        $this->abstractProductDynamicWriter = $abstractProductDynamicWriter;
        $this->concreteBundleProductWriter = $concreteBundleProductWriter;
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
            $this->concreteBundleProductWriter
        ];
    }
}