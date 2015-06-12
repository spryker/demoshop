<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\AbstractProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ConcreteProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;

class XmlProductTransformer implements XmlTransformerInterface
{

    /**
     * @param \SimpleXMLElement $abstractProductElement
     *
     * @return AbstractProduct
     */
    public function transform(\SimpleXMLElement $abstractProductElement)
    {
        return new AbstractProduct((string) $abstractProductElement['sku'], $this->parseVariants($abstractProductElement->variants));
    }

    /**
     * @param \SimpleXMLElement $variantsElement
     *
     * @return ConcreteProduct[]
     */
    private function parseVariants(\SimpleXMLElement $variantsElement)
    {
        $variantNodes = [];
        foreach ($variantsElement->variant as $variant) {
            $variantNode = new ConcreteProduct(
                (string) $variant['sku'],
                $this->parseOptionTypes($variant->options),
                $this->parseOptionTypeExclusions($variant),
                $this->parseConfigurationPresets($variant)
            );
            $variantNodes[] = $variantNode;
        }

        return $variantNodes;
    }

    /**
     * @param \SimpleXMLElement $optionsElement
     *
     * @return ProductOptionType[]
     */
    private function parseOptionTypes(\SimpleXMLElement $optionsElement)
    {
        if (empty($optionsElement)) {
            return [];
        }

        $optionTypeNodes = [];
        foreach ($optionsElement->option as $option) {
            $optionTypeNode = new ProductOptionType(
                (string) $option->key,
                $this->parseOptionValues($option->values),
                (bool) $option['isOptional']
            );
            $optionTypeNodes[] = $optionTypeNode;
        }

        return $optionTypeNodes;
    }

    /**
     * @param \SimpleXMLElement $optionValuesElement
     *
     * @return ProductOptionValue[]
     */
    private function parseOptionValues(\SimpleXMLElement $optionValuesElement)
    {
        $optionValueNodes = [];
        foreach ($optionValuesElement->value as $value) {
            $optionValueNode = new ProductOptionValue(
                (string) $value->key,
                (int) $value->sequence,
                $this->parseOptionValueConstraints($value->constraints)
            );
            $optionValueNodes[] = $optionValueNode;
        }

        return $optionValueNodes;
    }

    /**
     * @param \SimpleXMLElement $constraintsElement
     *
     * @return ProductOptionValueConstraint[]
     */
    private function parseOptionValueConstraints(\SimpleXMLElement $constraintsElement)
    {
        if (empty($constraintsElement)) {
            return [];
        }

        $constraintNodes = [];
        foreach ($constraintsElement->constraint as $constraint) {
            $constraintNode = new ProductOptionValueConstraint(
                (string) $constraint->target,
                (string) $constraint->operator
            );
            $constraintNodes[] = $constraintNode;
        }

        return $constraintNodes;
    }

    /**
     * @param \SimpleXMLElement $variantElement
     *
     * @return ProductConfiguration[]
     */
    private function parseConfigurationPresets(\SimpleXMLElement $variantElement)
    {
        if (empty($variantElement->{'option-config-presets'})) {
            return [];
        }

        $configNodes = [];
        foreach ($variantElement->{'option-config-presets'}->configuration as $config) {
            $values = [];
            foreach ($config->selection->value as $value) {
                $values[] = (string) $value;
            }

            $configNode = new ProductConfiguration(
                $values,
                (bool) $config['isDefault'],
                (int) $config->sequence
            );
            $configNodes[] = $configNode;
        }

        return $configNodes;
    }

    /**
     * @param \SimpleXMLElement $variantElement
     *
     * @return ProductOptionTypeExclusion[]
     */
    private function parseOptionTypeExclusions(\SimpleXMLElement $variantElement)
    {
        if (empty($variantElement->{'option-type-exclusions'})) {
            return [];
        }

        $exclusionNodes = [];
        foreach ($variantElement->{'option-type-exclusions'}->exclusion as $exclusion) {
            $exclusionNode = new ProductOptionTypeExclusion(
                (string) $exclusion->{'type-a'},
                (string) $exclusion->{'type-b'}
            );

            $exclusionNodes[] = $exclusionNode;
        }

        return $exclusionNodes;
    }
}
