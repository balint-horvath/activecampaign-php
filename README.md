# ActiveCampaign PHP Wrapper (under development)
PHP API client for ActiveCampaign API v3.
Compatible with PHP 7.0+.

# Installation

## via Composer
```bash
composer require balint-horvath/activecampaign-php
```

## Dependencies
- PHP7 (php>=7.0)
- Guzzle HTTP 6 (guzzlehttp/guzzle/~6.0)

# Basic Usage

Creating a new instance with API URL and Key.
Later we'll refer for it as `$ActiveCampaign` in the examples.

```php
$ActiveCampaign = new BalintHorvath\ActiveCampaign\ActiveCampaign("{{URL}}", "{{KEY}}");
```

Use:
```php
use BalintHorvath\ActiveCampaign\ActiveCampaign;
```

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

In general, calls on modules look like this:
```php
$ActiveCampaign->{ModuleGroup}->{Module}->{Method}($id, $properties);
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



# Testing
This package has included test cases for Kahlan.


# PSR

## PSR-4 Autoload
- BalintHorvath\\ActiveCampaign\\
- BalintHorvath\\ActiveCampaign\\Spec\\