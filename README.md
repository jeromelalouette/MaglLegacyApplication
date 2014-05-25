# MaglLegacyApplication - Legacy Applications in ZF2

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/maglnet/MaglLegacyApplication/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/maglnet/MaglLegacyApplication/?branch=master)

Run your legacy applications within Zend Framework 2.

## Introduction
Since rewriting your legacy application from scratch to a ZF2 application could be nearly impossible
due to time, effort, and resources, i was searching for a way to migrate a legacy application to a ZF2 application.

A [great article by Chris Abernethy][1] described a way on how to run your legacy application within ZF1, so
I migrated this HowTo to a small ZF2 module, to be able to run a legacy application within ZF2.

While running your legacy application within a ZF2 application it is possible to slowly migrate an existing application
to ZF2 by leaving your old application (nearly - see "Adjust your legacy Application") untouched and build new modules
with the power of ZF2.  
By adding a simple wrapper (see "Using ZF2 within your legacy application") you could also use the new modules
within your legacy application. 


## Installation
Install through composer
```json
{
    "require" : {
        "maglnet/magl-legacy-application" : "*"
    }
}
```

Copy the provided file `data/magl-zf2-legacy-wrapper.php` to your `public/` folder.
Copy the provided file `data/.htaccess` to your publix folder.
Copy your legacy Application to your `public/` folder.

Your legacy application should now run within ZF2. :)


## Configuration
For any SEO optimized route within your legacy application, add a route to the zend router that
routes to legacy controller and remove the mod_rewrite rules from your `.htaccess`
```php
return array(
    'router' => array(
        'routes' => array(
            // example for transferring mod rewrite rules to zf2 routes
            'legacy-seo-calendar' => array(
                'type' => 'Zend\Mvc\Router\Http\Regex',
                'options' => array(
                    'regex'    => '/calendar/(?<foo>.+)',
                    'defaults' => array(
                        'controller' => 'MaglLegacyApplication\Controller\Legacy',
                        'action'     => 'index',
                        'script'     => 'index-already-seo-optimized.php',
                    ),
                    'spec' => '/',
                ),
            ),
        ),
    ),
);
```

## Adjust your legacy Application
There are several cases in which your legacy application won't run without additional adjustments, here are some of them:

### Relative Paths
Using relative paths for `require`, `require_once` or `includes` will possibly fail now, since ZF2 will do a `chdir()`
to the ZF2's application root. So you will need to adjust your paths to match the new root.

Example:

```php
include '../lib/somelib.php';
```

should be changed to:

```php
include __DIR__ . '/../lib/somelib.php';
```

### Using Globals / Server `SCRIPT_FILENAME` or `SCRIPT_NAME`
Because of `mod_rewrite` rules, `SCRIPT_FILENAME` and `SCRIPT_NAME` won't be your real script anymore. 
If you use these variables, you need to adjust these places within your legacy application:

Example:

```php
$script_filename = $_SERVER['SCRIPT_FILENAME'];
$script_name     = $_SERVER['SCRIPT_NAME'];
```

should be changed to:

```php
use MaglLegacyApplication\MaglLegacyApplication;
$script_filename = MaglLegacyApplication::getLegacyScriptFilename();
$script_name     = MaglLegacyApplication::getLegacyScriptName();

```

## Using ZF2 within your legacy application
```php
use MaglLegacyApplication\MaglLegacyApplication;
MaglLegacyApplication::getApplication()->getServiceManager()->get('YourService');
```

# Contributing
If you have questions or problems regarding this module just open an issue or, even better,
solve it and open a pull request. :+1:

[1]: http://www.chrisabernethy.com/zend-framework-legacy-scripts/