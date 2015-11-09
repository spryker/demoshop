<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\WriterProvider;

use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterProviderInterface;

class PetsDeliWriterProvider implements ProductWriterProviderInterface
{
    protected $productWriter;


    public function __construct(ProductWriterInterface $productWriter) {
        $this->productWriter = $productWriter;

    }

    /**
     * @return ProductWriterInterface[]
     */
    public function getWriter()
    {

        return [
            $this->productWriter
        ];





    }
}