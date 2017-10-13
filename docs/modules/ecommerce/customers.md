# ActiveCampaign / Ecommerce / Customers

**API:** [`Ecommerce / Customers`](/docs/modules/ecommerce/customers.md)
**Helper Object:** [`ecomCustomer`](/docs/objects/ecommerce/ecomCustomer.md)
**Resource:** [`ecomCustomers`](https://:account.api-us1.com/api/3/ecomCustomers)
**Reference:** [#customers](https://developers.activecampaign.com/reference#customers)

- [About Helper Object](/docs/objects/)
- [Using General Objects](/docs/modules/)

# API

- **Class:** `BalintHorvath\ActiveCampaign\Ecommerce\Customer`
- **Namespace:** `BalintHorvath\ActiveCampaign\Ecommerce`

# `CRUD` Available Functions
- [`create` Create a customer]()
- [`read` Retrieve a customer]()
- [`update` Modify a customer]()
- [`delete` Remove a customer]()

# `create` Create a customer
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

# `read` Retrieve a customer

# `update` Modify a customer

# `delete` Remove a customer