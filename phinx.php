<?php

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/migrations'
        ],
    'environments' => [
        'default_migration_table' => 'schema_version',
        'default_database' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => getenv('IP'),
            'name' => 'c9',
            'user' => getenv('C9_USER'),
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8'
        ]
    ],
    'version_order' => 'creation'
];