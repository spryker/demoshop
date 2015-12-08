<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__)
    ->exclude('Generated')
    ->exclude('Propel/Base')
    ->exclude('Propel/Map')
    ->exclude('Propel/DE/Migration')
    ->exclude('data/DE/cache')
    ->exclude('tests/_helpers')
    ->exclude('tests/_support')
    ->exclude('Presentation')
    ->exclude('vendor')
    ->exclude('static')
    ->exclude('deploy')
    ->exclude('codeception')
    ->exclude('gulp')
    ->notName('*.twig')
    ->notName('*.yml')
;

return Symfony\CS\Config\Config::create()
    ->finder($finder)
    ->setUsingCache(true)
    ->level(\Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(
        [
            'blankline_after_open_tag',
            'braces',
            'concat_with_spaces',
            'double_arrow_multiline_whitespaces',
            'duplicate_semicolon',
            'empty_enclosing_lines',
            'encoding',
            'extra_empty_lines',
            'include',
            'list_commas',
            'multiline_array_trailing_comma',
            'namespace_no_leading_whitespace',
            'new_with_braces',
            'object_operator',
            'operator_spaces',
            'phpdoc_no_access',
            'phpdoc_no_package',
            'phpdoc_order',
            'phpdoc_scalar',
            'phpdoc_separation',
            'phpdoc_to_comment',
            'phpdoc_trim',
            'phpdoc_type_to_var',
            'phpdoc_var_without_name',
            'psr0',
            'remove_leading_slash_use',
            '-ordered_use',
            'remove_lines_between_uses',
            'return',
            'self_accessor',
            'single_array_no_trailing_comma',
            'single_line_before_namespace',
            'single_quote',
            'short_array_syntax',
            'short_tag',
            'spaces_before_semicolon',
            'spaces_cast',
            'standardize_not_equal',
            'strict',
            'ternary_spaces',
            'trim_array_spaces',
            'unalign_double_arrow',
            'unalign_equals',
            'unary_operators_spaces',
            'unused_use',
            'whitespacy_lines',
        ]
    )
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\EmptyEnclosingLinesFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\FunctionSpacingFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\MethodArgumentDefaultValueFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\RemoveFunctionAliasFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\ShortCastFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\NoInlineAssignmentFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\ConditionalExpressionOrderFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\NoIsNullFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\PreferCastOverFunctionFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\PhpSapiConstantFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\PhpdocParamsFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\PhpdocReturnSelfFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\NoWhitespaceBeforeSemicolonFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\SprykerUseStatementFixer())
    ->addCustomFixer(new \SprykerFeature\Zed\Development\Business\CodeStyleFixer\WhitespaceAfterReturnFixer());
