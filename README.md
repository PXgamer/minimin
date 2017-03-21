# minimin

A modular php interface for server management.

## Basic Plugin format

__App.php__
```php
<?php

namespace {vendor}\{plugin};

class App
{
    // When initialised by the Minimin class, it will pass the $route to the plugin App constructor
    public function __construct($route) {
        // ... Run plugin commands
    }
}
```
__Plugin.php__
```php
<?php

namespace {vendor}\{plugin};

class Plugin
{
    public static function info()
    {
        /** This function MUST return the following values:
         *  - app_namespace
         *  - name
         *  - link
         *  - description
         */
        
        $object = (object)[
            'app_namespace' => '\\{vendor}\\{plugin}', // The namespace of the plugin
            'name' => 'Cron Tasks', // The name of the plugin, may contain spaces
            'link' => 'cron-tasks', // The link that will be used (e.g. `cron-tasks` will be `/cron-tasks`)
            'description' => 'A cron task manager for servers.' // The description of the plugin
        ];
        
        return $object;
    }
}
```

## Example `data/plugins.json` format
```json
[
  {
    "app_namespace": "\\pxgamer\\CronTasks",
    "name": "Cron Tasks",
    "link": "cron-tasks",
    "description": "A cron task manager for servers."
  }
]
```