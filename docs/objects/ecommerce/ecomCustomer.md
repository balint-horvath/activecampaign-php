# ActiveCampaign / Ecommerce / ecomCustomer (Helper Object)

**API:** [`Ecommerce / Customers`](/docs/modules/ecommerce/customers.md)
**Helper Object:** [`ecomCustomer`](/docs/objects/ecommerce/ecomCustomer.md)
**Resource:** [`ecomCustomers`](https://:account.api-us1.com/api/3/ecomCustomers)
**Reference:** [#customers](https://developers.activecampaign.com/reference#customers)

- [About Helper Object](/docs/objects/README.md)
- [Using General Objects](/docs/modules/README.md)

# API

- **Class:** `BalintHorvath\ActiveCampaign\Object\Ecommerce\ecomCustomer`
- **Namespace:** `BalintHorvath\ActiveCampaign\Object\Ecommerce`

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
