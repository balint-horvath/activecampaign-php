# ActiveCampaign PHP Wrapper (under development)
This is an ActiveCampaign API v3 Wrapper for PHP 7.0+. This PHP SDK contains methods for easily interacting with the ActiveCampaign API.
Below there are some examples to get you started. For additional examples and explanations, see the [documentation](/docs/).

- [ActiveCampaign Website](https://activecampaign.com/)
- [ActiveCampaign API v3 Official Documentation](https://developers.activecampaign.com/reference)

# API Wrapper Logic
The structure is a little bit different than written in the official documentation.
We've two logical module levels instead of one: Module / Resource.
(To organize resources into logical groups.)

`deals` → `Deals / Deals`

The E-Commerce functions available under Ecommerce module instead of Deep Data group.
(To be more trivial and to prepare for more resources in the future, like products.) 

`ecomCustomers` → `Ecommerce / Customers`


# Credentials
To be able to use ActiveCampaign API you need the API URL and the API Key belong to your account.
You can find this information in your account under Settings / Developer, API Access section.

API URL looks like this: `https://{{account}}.api-us1.com` 
API Key looks like this: `d41d8cd98f00b204e9800998ecf8427ed41d8cd98f00b204e9800998ecf8427ed41d8cd9` 

Settings URL: `https://{{account}}.activehosted.com/admin/main.php?action=settings#tab_api`

# Installation

To install this wrapper, you need to use Composer in your project. If you are not using Composer yet, here's how to install:

```bash
curl -sS https://getcomposer.org/installer | php
```

## via Composer

```bash
composer require balint-horvath/activecampaign-php
```

### Phar
```bash
php composer.phar require balint-horvath/activecampaign-php
```

# Basic Usage

You should always use the autoloader of Composer in your application to automatically load the your dependencies.
All examples assumes you've already have included in your file:

```php
require 'vendor/autoload.php';
use BalintHorvath\ActiveCampaign;
```

### Instance
Creating a new instance with API URL and Key.
Later we'll refer for it as `$ActiveCampaign` in the examples.

```php
$ActiveCampaign = new ActiveCampaign("{{URL}}", "{{KEY}}");
```

### Usage
```php
use BalintHorvath\ActiveCampaign\ActiveCampaign;
```

### Aliasing
Using inside a class under different access name:
```php
use BalintHorvath\ActiveCampaign\ActiveCampaign as ActiveCampaignWrapper;

class ActiveCampaign
{

    public function __construct(){
        $ActiveCampaign = new ActiveCampaignWrapper("{{URL}}", "{{KEY}}");
    }
    
}
```

## Using Modules

In general, calls on resources look like this:
```php
$ActiveCampaign->{Module}->{Resource}->{Method}($id, $properties);
```

For example:
```php
$customerID = $ActiveCampaign->Ecommerce->Customer->get($id);
```

## Complete Example

For example:
```php
$ActiveCampaign = new ActiveCampaignWrapper("{{URL}}", "{{KEY}}");
$customerID = $ActiveCampaign->Ecommerce->Customer->get($id);
```

## Dependencies
- [PHP 7 (php:>=7.0)](http://php.net/)
- [Guzzle 6 (guzzlehttp/guzzle:~6.0)](http://docs.guzzlephp.org/en/stable/)


## Developer Dependencies
- [Kahlan 4 (kahlan/kahlan:^4.0)]((https://kahlan.github.io/docs/))

# Unit & BDD Test
This package has included test cases for [Kahlan](https://kahlan.github.io/docs/).


# PSR

## PSR-4 Autoload
- BalintHorvath\\ActiveCampaign\\
- BalintHorvath\\ActiveCampaign\\Spec\\
