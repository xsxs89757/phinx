<?php

//读取当前系统设置

return [
    "paths" => [
        "migrations" => "database/migrations",
        "seeds" => "database/seeds"
    ],
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "default_environment" => "dev",
        "dev" => [
            "adapter" => config('database.connections.mysql.driver'),
            "host" => config('database.connections.mysql.host'),
            "name" => config('database.connections.mysql.database'),
            "user" => config('database.connections.mysql.username'),
            "pass" => config('database.connections.mysql.password'),
            "port" => config('database.connections.mysql.port'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_0900_ai_ci'

        ]
    ],
    "migration_base_class" => \Qifen\phinx\Commands\MigrationBaseClass::class,
    "seeder_base_class" => \Qifen\phinx\Commands\SeederBaseClass::class
];
