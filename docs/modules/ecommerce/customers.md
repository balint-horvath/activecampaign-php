# ActiveCampaign / Ecommerce / Customers

**Helper Object:** `ecomCustomer`
**Resource:** `ecomCustomers`

- [About Helper Object]()
- [Using General Objects]()

# Create a customer
You can either use the built-in helper object `ecomCustomer` or you can simply pass an object or an array.

## Array
```php
$userCreation = $ActiveCampaign->Ecommerce->Customer->create([
    "email" => "user@example.com"
]);
```


## ecomCustomer
```php
use BalintHorvath\ActiveCampaign\Object\Ecommerce\ecomCustomer;

$user = new ecomCustomer();
$user->email = "user@example.com";
$userCreation = $ActiveCampaign->Ecommerce->Customer->create();
```
