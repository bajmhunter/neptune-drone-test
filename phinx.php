<?php

$dotenv = Dotenv\Dotenv::create('application/config');
$dotenv->overload();

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
            'host' => '127.0.0.1',
            'name' => 'neptune',
            'user' => 'root',
            'pass' => 'pass',
            'port' => '3306',
            'charset' => 'utf8'
        ]
    ],
    'version_order' => 'creation'
];