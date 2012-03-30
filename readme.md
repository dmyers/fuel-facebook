# Fuel-Facebook

Simple package for Facebook's PHP SDK for the FuelPHP framework.

More about facebook php sdk: https://github.com/facebook/facebook-php-sdk

## Installing

Download or clone from Github. Put it as 'facebook' (NOT fuel-facebook) dir in the packages dir and add to your app/config/config.php.

	git clone --recursive git@github.com:dmyers/fuel-facebook.git

## Usage

```php
Facebook::instance()->getUser();
```

## Config

Copy `PKGPATH/facebook/config/facebook.php` to your `APP/config/facebook.php` and change it as you need.

## Updating Fuel-Facebook

As facebook is a submodule, update it simply doing

	git pull --recurse-submodules