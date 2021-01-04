# Project Name Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ulties/php-project-name-generator.svg)](https://packagist.org/packages/ulties/php-project-name-generator)
[![Build Status](https://img.shields.io/github/workflow/status/ulties/php-project-name-generator/Tests?style=flat-square)](https://github.com/ulties/php-project-name-generator/actions?query=workflow%3ATests)
[![Total Downloads](https://img.shields.io/packagist/dt/ulties/php-project-name-generator.svg?style=flat-square)](https://packagist.org/packages/ulties/php-project-name-generator)

Generate random project names.

## Installation

You can install the package via composer:

```bash
composer require ulties/php-project-name-generator
```

## Usage

``` php
use Ulties\ProjectNameGenerator\Generator;

$projectName = Generator::generate($glue = ' ', $words = 2);
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Ulties](https://github.com/ulties)
- [All Contributors](https://github.com/ulties/php-project-name-generator/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Repository Generator

This package was generated using the [Repository Generator](https://github.com/ulties/repository-generator).
