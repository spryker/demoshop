<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ConcreteProduct implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $sku;

    /**
     * @var ProductOptionType[]
     */
    private $options = [];

    /**
     * @var ProductOptionTypeExclusion[]
     */
    private $typeExclusions = [];

    /**
     * @var ProductConfiguration[]
     */
    private $configurations = [];

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitConcreteProduct($this);

        $visitor->setContext($this);

        foreach($this->options as $option) {
            $option->accept($visitor);
        }

        foreach($this->typeExclusions as $exclusion) {
            $exclusion->accept($visitor);
        }

        foreach($this->configurations as $config) {
            $config->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $sku
     * @param ProductOptionType[] $options
     * @param ProductOptionTypeExclusion[] $typeExclusions
     * @param ProductConfiguration[] $configurations
     */
    public function __construct(
        $sku,
        array $options = [],
        array $typeExclusions = [],
        array $configurations = []
    ) {
        $this->sku = $sku;

        foreach($options as $option) {
            $this->addOption($option);
        }

        foreach($typeExclusions as $exclusion) {
            $this->addExclusion($exclusion);
        }

        foreach($configurations as $configuration) {
            $this->addConfiguration($configuration);
        }
    }

    /**
     * @param ProductOptionType $option
     */
    private function addOption(ProductOptionType $option)
    {
        $this->options[] = $option;
    }

    /**
     * @param ProductOptionTypeExclusion $exclusion
     */
    private function addExclusion(ProductOptionTypeExclusion $exclusion)
    {
        $this->typeExclusions[] = $exclusion;
    }

    /**
     * @param ProductConfiguration $configuration
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
     * @return ProductOptionType[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return ProductOptionTypeExclusion[]
     */
    public function getTypeExclusions()
    {
        return $this->typeExclusions;
    }

    /**
     * @return ProductConfiguration[]
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }
}
