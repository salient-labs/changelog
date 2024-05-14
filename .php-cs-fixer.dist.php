<?php

$finder = (new PhpCsFixer\Finder())
    ->in([
        __DIR__ . '/scripts',
        __DIR__ . '/src',
        __DIR__ . '/tests/unit',
    ])
    ->append([
        __DIR__ . '/bin/changelog',
    ]);

return (new PhpCsFixer\Config())
    ->setRules([
        'fully_qualified_strict_types' => true,
        'is_null' => true,
        'native_constant_invocation' => true,
        'no_superfluous_phpdoc_tags' => ['allow_mixed' => true],
        'no_unneeded_import_alias' => true,
        'no_unused_imports' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_order' => ['order' => [
            'todo',
            'method',
            'property',
            'api',
            'internal',
            'requires',
            'dataProvider',
            'backupGlobals',
            'template',
            'extends',
            'implements',
            'use',
            'phpstan-require-extends',
            'phpstan-require-implements',
            'readonly',
            'var',
            'param',
            'return',
            'throws',
        ]],
        // 'phpdoc_param_order' => true,
        'phpdoc_separation' => ['groups' => [
            ['see', 'link'],
            ['property', 'property-read'],
            ['requires', 'dataProvider', 'backupGlobals'],
            ['template', 'template-covariant'],
            ['extends', 'implements', 'use'],
            ['phpstan-require-extends', 'phpstan-require-implements'],
            ['readonly', 'var', 'phpstan-var', 'param', 'param-out', 'phpstan-param', 'return', 'phpstan-return', 'throws', 'phpstan-assert*', 'phpstan-ignore-next-line'],
            ['phpstan-*'],
        ]],
        'phpdoc_tag_casing' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types_order' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
        'single_import_per_statement' => true,
        'single_trait_insert_per_statement' => true,
        'yoda_style' => ['equal' => false, 'identical' => false],
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true);
