# Bcrud

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require bipin-karki/bcrud
```

## Usage
This command will create controllers, api routes, empty migration file
``` bash
$ php artisan bcrud:generator Contact
```
Once this command run successfully then you can update migration and run migrate fucntion. Then you can use api routes for resource process, Create, Store, Edit, Update, Destroy, Index

If Helpers were not installed
``` 
composer require laravel/helpers
```
Publish bcrud.stubs
``` 
php artisan vendor:publish
```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.



## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/bipin/bcrud.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/bipin/bcrud.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/bipin/bcrud/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/bipin/bcrud
[link-downloads]: https://packagist.org/packages/bipin/bcrud
[link-travis]: https://travis-ci.org/bipin/bcrud
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/bipin
[link-contributors]: ../../contributors
