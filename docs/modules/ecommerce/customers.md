# ActiveCampaign / Ecommerce / Customers

**Helper Object:** `ecomCustomer`
**Resource:** `ecomCustomers`
**Reference:** [#customers](https://developers.activecampaign.com/reference#customers)

- [About Helper Object]()
- [Using General Objects]()

# Create a customer
You can either use the built-in helper object `ecomCustomer` or you can simply pass an object or an array.

## ecomCustomer
```php
use BalintHorvath\ActiveCampaign\Object\Ecommerce\ecomCustomer;

$user = new ecomCustomer();
$user->email = "user@example.com";
$userCreation = $ActiveCampaign->Ecommerce->Customer->create();
```

## Array
```php
$userCreation = $ActiveCampaign->Ecommerce->Customer->create([
    "email" => "user@example.com"
]);
```

## Object
```php
$userCreation = $ActiveCampaign->Ecommerce->Customer->create((object) [
    "email" => "user@example.com"
]);
```
