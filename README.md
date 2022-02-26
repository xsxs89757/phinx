## 适用于webman的数据库迁移插件

### 安装

```
composer require qifen/phinx
```

> 插件依赖

```
workerman/webman-framework
symfony/console
robmorgan/phinx
illuminate/database
```

### 配置

``` php
//config/plugin/qifen/phinx/phinx.php
<?php

//读取当前系统设置

return [
    "paths" => [
        "migrations" => "database/migrations", //在项目根目录下创建此路径
        "seeds" => "database/seeds" //在项目根目录下创建此路径
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
```

### 使用

```
php phinx
```

