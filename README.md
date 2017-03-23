# minimin

A modular php interface for server management.

## Basic Plugin format

Classes accessible to plugins:
- Smarter (this will need to have a custom template directory added using `addTemplateDir()`)
- System\* (nezamy/route classes)
- Any classes that they import/require

Packages should follow the folder structure below:
```text
/
    src/
        /Templates
            /{PluginName}
        App.php
        Plugin.php
    composer.json
```

For reference, view the [minimin-package-example](https://github.com/PXgamer/minimin-package-example) plugin on Github.

__App.php__
```php
<?php

namespace {vendor}\{plugin};

use pxgamer\Minimin\Smarter;

class App
{
    // When initialised by the Minimin class, it will pass the $route to the plugin App constructor
    public function __construct($route)
    {
        // ... Run plugin commands
        $Smarter = Smarter::get();
        $Smarter->addTemplateDir(__DIR__ . '/Templates/');
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