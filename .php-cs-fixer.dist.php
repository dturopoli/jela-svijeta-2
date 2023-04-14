<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var');

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'function_declaration' => false,
        'no_whitespace_in_blank_line' => false,
        'yoda_style' => false,
    ])
    ->setFinder($finder);
