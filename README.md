# Aist Filesystem Component [![SensioLabsInsight](https://insight.sensiolabs.com/projects/3b68fda3-866a-48a0-b5e4-3e96bebb4dd1/small.png)](https://insight.sensiolabs.com/projects/3b68fda3-866a-48a0-b5e4-3e96bebb4dd1)

[![build status][build image]][build]
[![coverage status][coverage image]][coverage]
[![code climate][Code Climate image]][Code Climate]
[![scrutinizer][Scrutinizer image]][Scrutinizer]
[![check][SensioLabsInsight image]][SensioLabsInsight]
[![packagist][Packagist image]][Packagist]

![requirements][dependencies image]
[![issues][issues image]][issues]
[![pull requests][pull requests image]][pull requests]

[![Minimum PHP Version][Minimum PHP Version image]][PHP]
[![license][license image]][license]

## Installation
Install via composer:
```console
$ composer require aist/filesystem
```
> ###### zf-component-installer
>
> If you use [zf-component-installer](https://github.com/zendframework/zf-component-installer),
> that component will install itself as a module for you.

## Commands

### Copy
Copy `<source path>` to `<target path>` with optional overwrite `[-f]`.

Parameters:  
- `--source` source path *required
- `--target` target path *required
- `-f` force overwrite

```console
$ vendor/bin/console filesystem:copy --source <source path> --target <target path> [-f]
```

  [build image]: https://img.shields.io/travis/ma-si/filesystem/master.svg?style=flat-square
  [build]: https://secure.travis-ci.org/ma-si/filesystem
  [coverage image]: https://img.shields.io/coveralls/ma-si/filesystem.svg?style=flat-square
  [coverage]: https://coveralls.io/r/ma-si/filesystem?branch=master
  
  [Code Climate image]: https://img.shields.io/codeclimate/github/ma-si/filesystem.svg?style=flat-square
  [Code Climate]: https://codeclimate.com/github/ma-si/filesystem
  [Scrutinizer image]: https://img.shields.io/scrutinizer/g/ma-si/filesystem.svg?style=flat-square
  [Scrutinizer]: https://scrutinizer-ci.com/g/ma-si/filesystem
  
  [SensioLabsInsight image]: https://img.shields.io/sensiolabs/i/3b68fda3-866a-48a0-b5e4-3e96bebb4dd1.svg?style=flat-square
  [SensioLabsInsight]: https://insight.sensiolabs.com/projects/3b68fda3-866a-48a0-b5e4-3e96bebb4dd1
  
  [Packagist image]: https://img.shields.io/packagist/v/aist/filesystem.svg?style=flat-square
  [Packagist]: https://packagist.org/packages/aist/filesystem

  [dependencies image]: https://img.shields.io/requires/github/ma-si/filesystem.svg?style=flat-square
  [issues image]: https://img.shields.io/github/issues/ma-si/filesystem.svg?style=flat-square
  [issues]: https://github.com/ma-si/filesystem/issues
  [pull requests image]: https://img.shields.io/github/issues-pr/ma-si/filesystem.svg?style=flat-square
  [pull requests]: https://github.com/ma-si/filesystem/pulls
  
  [Minimum PHP Version image]: https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg?style=flat-square
  [PHP]: https://php.net
  [license image]: https://poser.pugx.org/aist/filesystem/license?format=flat-square
  [license]: https://opensource.org/licenses/BSD-3-Clause
