# Fuel Facebook Package

A super simple Facebook package for Facebook's PHP SDK for Fuel.

## About
* Version: 1.0.0
* License: MIT License
* Author: Derek Myers

## Installation

Simply add the following to your composer.json require block:

	'facebook/php-sdk'

### Git Submodule

If you are installing this as a submodule (recommended) in your git repo root, run this command:

	$ git submodule add git://github.com/dmyers/fuel-facebook.git fuel/packages/facebook

Then you you need to initialize and update the submodule:

	$ git submodule update --init --recursive fuel/packages/facebook/

### Download

Alternatively you can download it and extract it into `fuel/packages/facebook/`.

## Usage

```php
$facebook = Facebook::instance();
$user = $facebook->getUser();

if ($user) {
	try {
		$userInfo = $facebook->api('/me');
		echo $userInfo['name'];
	} catch (FacebookApiException $e) {
		echo $e->getMessage();
	}

	$logoutUrl = $facebook->getLogoutUrl();
} else {
	$loginUrl = $facebook->getLoginUrl();
}
```

For more examples, check out the [Facebook PHP SDK](https://github.com/facebook/facebook-php-sdk).

## Configuration

Configuration is easy. First thing you will need to do is to [register your app with Facebook](https://developers.facebook.com/apps) (if you haven't already).

Next, copy the `config/facebook.php` from the package up into your `app/config/` directory. Open it up and enter your API keys.

## Updates

In order to keep the package up to date simply run:

	$ git submodule update --recursive fuel/packages/facebook/
