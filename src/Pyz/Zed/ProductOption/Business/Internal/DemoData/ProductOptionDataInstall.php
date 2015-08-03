<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\WriterInterface;
use Propel\Runtime\Propel;

class ProductOptionDataInstall extends AbstractInstaller
{

    /**
     * @var WriterInterface
     */
    protected $optionWriter;
    protected $productOptionWriter;

    /**
     * @param WriterInterface $optionWriter
     * @param WriterInterface $ProductOptionWriter
     */
    public function __construct(
        WriterInterface $optionWriter,
        WriterInterface $ProductOptionWriter
    ) {
        $this->optionWriter = $optionWriter;
        $this->productOptionWriter = $ProductOptionWriter;
    }

    public function install()
    {
        $this->info('This will install some demo product options and product option assignments');

        $this->optionWriter->write();
        $this->productOptionWriter->write();
    }

}
