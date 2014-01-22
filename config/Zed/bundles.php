<?php

const CONFIG_KEY_NAMESPACE_PROJECT = 'projectNamespace';
const NAMESPACE_CORE = 'ProjectA';

const ACTIVATE_BOOTSTRAP = 'activate bootstrap';
const ACTIVATE_NAVIGATION = 'activate navigation';
const ACTIVATE_SCHEMA = 'activate schema';

return [
    \ProjectA_Shared_Library_Config::get(CONFIG_KEY_NAMESPACE_PROJECT) => [],
    // Core bundles
    NAMESPACE_CORE => [
        'Auth' => [
            ACTIVATE_BOOTSTRAP,
            ACTIVATE_NAVIGATION,
            ACTIVATE_SCHEMA
        ],
        'Glossary' => [
            ACTIVATE_BOOTSTRAP,
            ACTIVATE_NAVIGATION,
            ACTIVATE_SCHEMA
        ],
        'ProductImage' => [
            ACTIVATE_BOOTSTRAP,
            ACTIVATE_NAVIGATION,
            ACTIVATE_SCHEMA
        ]
    ],
];
