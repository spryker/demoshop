<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

use Zend\Filter\FilterChain;
use Zend\Filter\StringToUpper;
use Zend\Filter\Word\CamelCaseToUnderscore;

require_once __DIR__ . '/vendor/autoload.php';

$refactorer = new class
{
    /**
     * @param string $constructorArguments
     *
     * @return void
     */
    public function build($constructorArguments)
    {
        $extracted = $this->extract($constructorArguments);
        $constants = $this->buildConstants($extracted);
        $setRequired = $this->buildSetRequiredMethod($extracted);
        $setAllowed = $this->buildSetAllowedTypesMethod($extracted);
        $injectFromOptions = $this->buildInjectFromOptionsMethod($extracted);

        echo PHP_EOL . PHP_EOL . PHP_EOL;
        echo $constants . PHP_EOL . PHP_EOL . PHP_EOL;
        echo $setRequired . PHP_EOL . PHP_EOL . PHP_EOL;
        echo $setAllowed . PHP_EOL . PHP_EOL . PHP_EOL;
        echo $injectFromOptions . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    /**
     * @param mixed $constructorArguments
     *
     * @return array
     */
    protected function extract($constructorArguments)
    {
        $variablesAndTypes = explode(',', $constructorArguments);
        $variableAndTypeMap = [];

        foreach ($variablesAndTypes as $variableAndType) {
            $type = null;
            $variable = $variableAndType;

            $variableAndType = trim($variableAndType);
            if (strpos($variableAndType, ' ') !== false) {
                list($type, $variable) = explode(' ', $variableAndType);
            }

            $variableAndTypeMap[$variable] = $type;
        }

        return $variableAndTypeMap;
    }

    /**
     * @param string $variableName
     *
     * @return string
     */
    protected function variableNameToConst($variableName)
    {
        $variableName = str_replace('$', '', trim($variableName));
        $filterChain = new FilterChain();
        $filterChain->attach(new CamelCaseToUnderscore());
        $filterChain->attach(new StringToUpper());

        return $filterChain->filter($variableName);
    }

    /**
     * @param array $extracted
     *
     * @return string
     */
    protected function buildConstants(array $extracted)
    {
        $constants = [];

        foreach ($extracted as $variableName => $type) {
            $constants[] = sprintf('    const OPTION_%1$s = \'%1$s\';', $this->variableNameToConst($variableName));
        }

        return implode(PHP_EOL, $constants);
    }

    /**
     * @param array $extracted
     *
     * @return string
     */
    protected function buildSetRequiredMethod(array $extracted)
    {
        $setRequired = '
/**
 * @param OptionResolver $optionResolver
 *
 * @return void
 */
protected function setRequired(OptionResolver $optionResolver)
{
    $optionResolver->setRequired([
';
        foreach ($extracted as $variable => $type) {
            $setRequired .= '        static::OPTION_' . $this->variableNameToConst($variable) . ',' . PHP_EOL;
        }

        $setRequired .= '    ]);' . PHP_EOL;
        $setRequired .= '}';

        return $setRequired;
    }

    /**
     * @param array $extracted
     *
     * @return string
     */
    protected function buildSetAllowedTypesMethod(array $extracted)
    {
        $setAllowedTypes = '
/**
 * @param OptionResolver $optionResolver
 *
 * @return void
 */
protected function setAllowedTypes(OptionResolver $optionResolver)
{
';
        foreach ($extracted as $variableName => $type) {
            if ($type === null) {
                continue;
            }
            $constName = $this->variableNameToConst($variableName);
            $normalized = sprintf('\'%s\'', $type);
            if ($this->isClassOrInterface($type)) {
                $normalized = $type . '::class';
            }
            $setAllowedTypes .= sprintf('    $optionResolver->setAllowedTypes(static::OPTION_%s, %s);', $constName, $normalized) . PHP_EOL;
        }

        $setAllowedTypes .= '}';

        return $setAllowedTypes;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    protected function isClassOrInterface($type)
    {
        $types = [
            'string',
            'array',
            'int',
            'callable',
            'iterator',
            'bool',
        ];

        return !isset($types[$type]);
    }

    /**
     * @param array $extracted
     *
     * @return string
     */
    protected function buildInjectFromOptionsMethod(array $extracted)
    {
        $injectFromOptions = '
/**
 * @param array $options
 *
 * @return void
 */
protected function injectFromOptions(array $options)
{
';
        foreach ($extracted as $variableName => $type) {
            $memberName = str_replace('$', '', $variableName);
            $constName = $this->variableNameToConst($variableName);
            $injectFromOptions .= sprintf('    $this->%s = $options[static::OPTION_%s;', $memberName, $constName) . PHP_EOL;
        }

        $injectFromOptions .= '}';

        return $injectFromOptions;
    }

};

$testCases = [
    'array $foo',
    '$foo, MyType $bar, $baz',
    'MyType $foo, MyOtherType $bar',
];

$refactorer->build($testCases[2]);
