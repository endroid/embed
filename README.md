# Embed

*By [endroid](https://endroid.nl/)*

[![Latest Stable Version](http://img.shields.io/packagist/v/endroid/embed.svg)](https://packagist.org/packages/endroid/embed)
[![Build Status](https://github.com/endroid/embed/workflows/CI/badge.svg)](https://github.com/endroid/embed/actions)
[![Total Downloads](http://img.shields.io/packagist/dt/endroid/embed.svg)](https://packagist.org/packages/endroid/embed)
[![License](http://img.shields.io/packagist/l/endroid/embed.svg)](https://packagist.org/packages/endroid/embed)

Library for embedding external resources and reduce the number of requests.<br />
Read the [blog](https://medium.com/@endroid/pdf-generation-in-symfony-3080702353b)
for more information on why I created this extension.

## Usage

This library helps you reduce the number of external resources to load by
allowing you to embed external resources via a Twig extension. You can use this
extension to embed resources like fonts, stylesheets, scripts etc.

```php
<link rel="stylesheet" href="{{ embed(asset('/styles.css')) }}">

<style>
@font-face {
    font-family: 'SCP';
    font-weight: normal;
    src: url('{{ embed('https://fontlibrary.org/scp.ttf') }}');
}
</style>
```

## Installation

Use [Composer](https://getcomposer.org/) to install the library.

``` bash
$ composer require endroid/embed
```

When you use Symfony, the [installer](https://github.com/endroid/installer)
makes sure that services are automatically wired.. If this is not the case you
can find the configuration files in the `.install/symfony` folder.

## Versioning

Version numbers follow the MAJOR.MINOR.PATCH scheme. Backwards compatible
changes will be kept to a minimum but be aware that these can occur. Lock
your dependencies for production and test your code when upgrading.

## License

This bundle is under the MIT license. For the full copyright and license
information please view the LICENSE file that was distributed with this source code.
