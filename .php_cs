<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude(__DIR__ . '/vendor/project-a/kendo-package')
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/vendor/project-a')
;
return Symfony\CS\Config\Config::create()
    ->fixers(
        array(
            'controls-spaces',
            'braces',
            'elseif',
            'eof_ending',
            'extra_empty_lines',
            'include',
            'indentation',
            'linefeed',
            'php_closing_tag',
            'phpdoc_params',
            'psr0',
            'return',
            'short_tag',
            'trailing_spaces',
            'unused_use',
            'visibility'
        )
    )
    ->finder($finder)
;
