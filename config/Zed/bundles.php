<?php

const CONFIG_KEY_NAMESPACE_PROJECT = 'projectNamespace';
const NAMESPACE_CORE = 'ProjectA';

const ACTIVATE_BOOTSTRAP = 'activate bootstrap';
const ACTIVATE_NAVIGATION = 'activate navigation';
const ACTIVATE_SCHEMA = 'activate schema';

/**
 * @var $schemata array
 */
$bundleConfig = [
    ProjectA_Shared_Library_Config::get(CONFIG_KEY_NAMESPACE_PROJECT) => [],
    NAMESPACE_CORE => [
        'Acl' => [
            ACTIVATE_BOOTSTRAP,
            ACTIVATE_NAVIGATION,
            ACTIVATE_SCHEMA,
        ]
    ],
];
