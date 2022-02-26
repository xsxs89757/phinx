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

```
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
            "adapter" => env('DB_CONNECTION', 'mysql'),
            "host" => env('DB_HOST', '127.0.0.1'),
            "name" => env('DB_DATABASE', 'forge'),
            "user" => env('DB_USERNAME', 'forge'),
            "pass" => env('DB_PASSWORD', ''),
            "port" => env('DB_PORT', '3306'),
            "charset" => "utf8"
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

