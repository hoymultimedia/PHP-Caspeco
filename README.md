# Caspeco

![caspeco](https://cloud.githubusercontent.com/assets/499192/10389414/889fba38-6e71-11e5-8620-3d2a8831dc2f.png)

A Caspeco API library for PHP with Laravel support.

[![Build Status](https://img.shields.io/travis/hoymultimedia/PHP-Caspeco/master.svg?style=flat)](https://travis-ci.org/hoymultimedia/PHP-Caspeco)
[![StyleCI](https://styleci.io/repos/43556637/shield?style=flat)](https://styleci.io/repos/43556637)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/hoymultimedia/PHP-Caspeco.svg?style=flat)](https://scrutinizer-ci.com/g/hoymultimedia/PHP-Caspeco/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/hoymultimedia/PHP-Caspeco.svg?style=flat)](https://scrutinizer-ci.com/g/hoymultimedia/PHP-Caspeco)
[![Latest Version](https://img.shields.io/github/release/hoymultimedia/PHP-Caspeco.svg?style=flat)](https://github.com/hoymultimedia/PHP-Caspeco/releases)
[![License](https://img.shields.io/packagist/l/hoy/caspeco.svg?style=flat)](https://packagist.org/packages/hoy/caspeco)

## Installation
Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
composer require hoy/caspeco
```

### Using Laravel?

Add the service provider to `config/app.php` in the `providers` array.

```php
Hoy\Caspeco\CaspecoServiceProvider::class
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in `config/app.php` to your aliases array.

```php
'Caspeco' => Hoy\Caspeco\Facades\Caspeco::class
```

## Configuration

Caspeco requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
php artisan vendor:publish
```

This will create a `config/caspeco.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Caspeco Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

#### CaspecoManager

This is the class of most interest. It is bound to the ioc container as `caspeco` and can be accessed using the `Facades\Caspeco` facade. This class implements the ManagerInterface by extending AbstractManager. The interface and abstract class are both part of [Graham Campbell's](https://github.com/GrahamCampbell) [Laravel Manager](https://github.com/GrahamCampbell/Laravel-Manager) package, so you may want to go and checkout the docs for how to use the manager class over at that repository. Note that the connection class returned will always be an instance of `Hoy\Caspeco\Caspeco`.

#### Facades\Caspeco

This facade will dynamically pass static method calls to the `caspeco` object in the ioc container which by default is the `CaspecoManager` class.

#### CaspecoServiceProvider

This class contains no public methods of interest. This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples
Here you can see an example of just how simple this package is to use. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use Hoy\Caspeco\Facades\Caspeco;

Caspeco::charges()->find($id);
// We're done here - how easy was that, it just works!

Caspeco::charges()->capture($id);
// This example is simple and there are far more methods available.
```

The Caspeco manager will behave like it is a `Hoy\Caspeco\Caspeco`. If you want to call specific connections, you can do that with the connection method:

```php
use Hoy\Caspeco\Facades\Caspeco;

// Writing this…
Caspeco::connection('main')->customers()->find($id);

// …is identical to writing this
Caspeco::customers()->find($id);

// and is also identical to writing this.
Caspeco::connection()->customers()->find($id);

// This is because the main connection is configured to be the default.
Caspeco::getDefaultConnection(); // This will return main.

// We can change the default connection.
Caspeco::setDefaultConnection('alternative'); // The default is now alternative.
```

If you prefer to use dependency injection over facades like me, then you can inject the manager:

```php
use Hoy\Caspeco\CaspecoManager;

class Foo
{
	protected $caspeco;

	public function __construct(CaspecoManager $caspeco)
	{
		$this->caspeco = $caspeco;
	}

	public function bar($id)
	{
		$this->caspeco->customers()->find($id);
	}
}

App::make('Foo')->bar();
```

## Documentation
There are other methods in this package that are not documented here. Instead, please see [Caspeco's documentation](http://docs.caspecopayment.apiary.io/). If you've any questions, don't hesitate to open an issue.

## License

Caspeco is licensed under [The MIT License (MIT)](LICENSE).
