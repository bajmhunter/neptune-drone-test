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
            'host' => getenv('MYSQL_HOST_NAME'),
            'name' => getenv('MYSQL_DB_NAME'),
            'user' => getenv('MYSQL_USERNAME'),
            'pass' => getenv('MYSQL_PASSWORD'),
            'port' => '3306',
            'charset' => 'utf8'
        ]
    ],
    'version_order' => 'creation'
];