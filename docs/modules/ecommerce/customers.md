# ActiveCampaign / Ecommerce / Customers

**Helper Object:** `ecomCustomer`
**Resource:** `ecomCustomers`
**Reference:** [#customers](https://developers.activecampaign.com/reference#customers)

- [About Helper Object]()
- [Using General Objects]()

# Customer Properties

Required|Read-only|Property|Type|Description|
----|----|---------------|------------------|----------------------------------------------------------------------------------------
 ✔  | ✗  | connectionid  | string (numeric) | The id of the connection object for the service where the customer originates.|
 ✔  | ✗  | externalid    | string (numeric) | The id of the customer in the external service. |
 ✔  | ✗  | email         | string (email)   | The email address of the customer.|
 ✗  | ✔  | totalRevenue  | string (numeric)   | The total revenue amount for the customer. |
 ✗  | ✔  | totalOrders  | string (numeric)   | The total number of orders placed by the customer. |
 ✗  | ✔  | totalProducts  | string (numeric)   | The total number of products ordered by the customer. |
 ✗  | ✔  | avgRevenuePerOrder  | string (numeric)   | The average revenue per order for the customer. |
 ✗  | ✔  | avgProductCategory  | string (numeric)   | The most frequent product category ordered by a customer. |
 ✗  | ✔  | tstamp  | string (timestamp: Y-m-d\TH:i:sP)   | The last modification time of the cusotmer. |
 ✗  | ✔  | connection  | string (numeric)   | The number of connections to the customer. |


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