<?php
    require 'vendor/autoload.php';

    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $database = $mongoClient->selectDatabase("system");
    $collection = $database->selectCollection("products");

    $products = $collection->find()->toArray();

    header('Content-Type: application/json');
    echo json_encode($products);
?>
