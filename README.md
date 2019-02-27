<p align="center"><img src="https://user-images.githubusercontent.com/1472352/53495897-d78b7300-3adb-11e9-845d-1131fdf4d14a.png" height="60" /></p>

<p align="center"> Beautiful document tool for your project..</p>


## Installing

```shell
$ composer require overtrue/wisteria -vvv
```

## Usage

### Installation

```php
$ composer require overtrue/wisteria -vvv
```

Publish config and required assets:

```php
$ php artisan wisteria:install
```

Update config file `config/wisteria.php` with right repository url of your docs, Then init the docs files:

```php
$ php artisan wisteria:refresh
```

Done. 

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/overtrue/wisteria/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/overtrue/wisteria/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
