<?php 

// require_once "./classes/MySql.php";

// $MySql = new MySql;

require_once "./classes/Product.php";

$obj = new Product;

print_r($obj->getAll());