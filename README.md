# minimin

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A modular php interface for server management.

## Structure

```
public/
src/
tests/
vendor/
```

## Install

Via Composer

``` bash
$ composer create-project pxgamer/minimin
```

## Usage

### Basic Plugin format

Classes accessible to plugins:
- Smarter (this will need to have a custom template directory added using `addTemplateDir()`)
- System\* (`nezamy/route` classes)
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

For reference, view the [minimin-package-example](https://github.com/pxgamer/minimin-package-example) plugin on Github.

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

### Example `data/plugins.json` format

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

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email owzie123@gmail.com instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/minimin.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/minimin/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/85681760/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/minimin.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/minimin.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/minimin
[link-travis]: https://travis-ci.org/pxgamer/minimin
[link-styleci]: https://styleci.io/repos/85681760
[link-code-quality]: https://codecov.io/gh/pxgamer/minimin
[link-downloads]: https://packagist.org/packages/pxgamer/minimin
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
