<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Transformer;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\AbstractProduct;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ConcreteProduct;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;

class XmlProductTransformer implements XmlTransformerInterface
{

    /**
     * @param \SimpleXMLElement $data
     *
     * @return AbstractProduct
     */
    public function transform(\SimpleXMLElement $data)
    {
        return new AbstractProduct((string) $data['sku'], $this->parseVariants($data->variants));
    }

    /**
     * @param \SimpleXMLElement $variants
     *
     * @return ConcreteProduct[]
     */
    private function parseVariants($variants)
    {
        $variantNodes = [];
        foreach ($variants->variant as $variant) {
            $variantNode = new ConcreteProduct(
                (string) $variant['sku'],
                $this->parseOptionTypes($variant->options),
                $this->parseOptionTypeExclusions($variant->{'option-type-exclusions'}),
                $this->parseConfigurationPresets($variant->{'option-config-presets'})
            );
            $variantNodes[] = $variantNode;
        }

        return $variantNodes;
    }

    /**
     * @param \SimpleXMLElement $optionTypes
     *
     * @return ProductOptionType[]
     */
    private function parseOptionTypes($optionTypes)
    {
        if (empty($optionTypes)) {
            return [];
        }

        $optionTypeNodes = [];
        foreach ($optionTypes->option as $option) {
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
     * @param \SimpleXMLElement $optionValues
     *
     * @return ProductOptionValue[]
     */
    private function parseOptionValues($optionValues)
    {
        $optionValueNodes = [];
        foreach ($optionValues->value as $value) {
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
     * @param \SimpleXMLElement $optionValueConstraints
     *
     * @return ProductOptionValueConstraint[]
     */
    private function parseOptionValueConstraints($optionValueConstraints)
    {
        if (empty($optionValueConstraints)) {
            return [];
        }

        $constraintNodes = [];
        foreach ($optionValueConstraints->constraint as $constraint) {
            $constraintNode = new ProductOptionValueConstraint(
                (string) $constraint->target,
                (string) $constraint->operator
            );
            $constraintNodes[] = $constraintNode;
        }

        return $constraintNodes;
    }

    /**
     * @param \SimpleXMLElement $configs
     *
     * @return ProductConfiguration[]
     */
    private function parseConfigurationPresets($configs)
    {
        if (empty($configs)) {
            return [];
        }

        $configNodes = [];
        foreach ($configs->configuration as $config) {
            $values = [];
            foreach ($config->selection->value as $value) {
                $values[] = (string) $value;
            }

            $configNode = new ProductConfiguration(
                $values,
                (string) $config['isDefault'],
                (int) $config->sequence
            );
            $configNodes[] = $configNode;
        }

        return $configNodes;
    }

    /**
     * @param \SimpleXMLElement $exclusions
     *
     * @return ProductOptionTypeExclusion[]
     */
    private function parseOptionTypeExclusions($exclusions)
    {
        if (empty($exclusions)) {
            return [];
        }

        $exclusionNodes = [];
        foreach ($exclusions->exclusion as $exclusion) {
            $exclusionNode = new ProductOptionTypeExclusion(
                (string) $exclusion->{'type-a'},
                (string) $exclusion->{'type-b'}
            );

            $exclusionNodes[] = $exclusionNode;
        }

        return $exclusionNodes;
    }
}
