# Braintree PHP SDK extensions for PHPStan

[![Build Status](https://travis-ci.org/finwe/phpstan-braintree.svg)](https://travis-ci.org/finwe/phpstan-braintree)
[![Latest Stable Version](https://poser.pugx.org/finwe/phpstan-braintree/v/stable)](https://packagist.org/packages/finwe/phpstan-braintree)
[![License](https://poser.pugx.org/finwe/phpstan-braintree/license)](https://packagist.org/packages/finwe/phpstan-braintree)

* [PHPStan](https://github.com/phpstan/phpstan)
* [Braintree PHP SDK](https://github.com/braintree/braintree_php)

This extension provides following features:

* Provides definitions for magic `Braintree` classes properties

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev finwe/phpstan-braintree
```

And include extension.neon in your project's PHPStan config:

```
includes:
	- vendor/finwe/phpstan-braintree/extension.neon
```
