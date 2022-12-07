<?php


$data = new ProductsController();
$products = $data->getAllProducts();
print_r($products);

?>