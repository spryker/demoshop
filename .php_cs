<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__ . '/src')
    ->exclude('Generated')
;
return Symfony\CS\Config\Config::create()
    ->fixers(
        array(
            'controls-spaces',
            'braces',
            'elseif',
            'eof_ending',
            'extra_empty_lines',
            'function_declaration',
            'include',
            'indentation',
            'linefeed',
            'php_closing_tag',
            'psr0',
            'short_tag',
            'trailing_spaces',
            'unused_use',
            'visibility'
        )
    )
    ->finder($finder)
;
