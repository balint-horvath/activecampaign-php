<?php

require '../../initialization.php';

$listCustomer = $AC->Ecommerce->Customers->ls();

var_dump($listCustomer->getArray());
