<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ProductConcrete implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $sku;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType[]
     */
    private $options = [];

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion[]
     */
    private $typeExclusions = [];

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration[]
     */
    private $configurations = [];

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductConcrete($this);

        $visitor->setContext($this);

        foreach ($this->options as $option) {
            $option->accept($visitor);
        }

        foreach ($this->typeExclusions as $exclusion) {
            $exclusion->accept($visitor);
        }

        foreach ($this->configurations as $config) {
            $config->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $sku
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType[] $options
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion[] $typeExclusions
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration[] $configurations
     */
    public function __construct(
        $sku,
        array $options = [],
        array $typeExclusions = [],
        array $configurations = []
    ) {
        $this->sku = $sku;

        foreach ($options as $option) {
            $this->addOption($option);
        }

        foreach ($typeExclusions as $exclusion) {
            $this->addExclusion($exclusion);
        }

        foreach ($configurations as $configuration) {
            $this->addConfiguration($configuration);
        }
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType $option
     */
    private function addOption(ProductOptionType $option)
    {
        $this->options[] = $option;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion $exclusion
     */
    private function addExclusion(ProductOptionTypeExclusion $exclusion)
    {
        $this->typeExclusions[] = $exclusion;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration $configuration
     */
    private function addConfiguration(ProductConfiguration $configuration)
    {
        $this->configurations[] = $configuration;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion[]
     */
    public function getTypeExclusions()
    {
        return $this->typeExclusions;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration[]
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

}
