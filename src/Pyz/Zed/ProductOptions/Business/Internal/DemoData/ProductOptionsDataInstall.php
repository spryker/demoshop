<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Writer\WriterInterface;
use Propel\Runtime\Propel;

class ProductOptionsDataInstall extends AbstractInstaller
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

        $pdo = Propel::getConnection();
        $pdo->exec("SET foreign_key_checks = 0");
        $pdo->exec("TRUNCATE spy_product_option_type_exclusion");
        $pdo->exec("TRUNCATE spy_product_option_value_constraint");
        $pdo->exec("TRUNCATE spy_configuration_preset_value");
        $pdo->exec("TRUNCATE spy_configuration_preset");
        $pdo->exec("TRUNCATE spy_product_option_value");
        $pdo->exec("TRUNCATE spy_product_option_type");
        $pdo->exec("TRUNCATE spy_option_value_price");
        $pdo->exec("TRUNCATE spy_option_value");
        $pdo->exec("TRUNCATE spy_option_type");
        $pdo->exec("SET foreign_key_checks = 1");

        $this->optionWriter->write();
        $this->productOptionWriter->write();
    }
}
