<?php
    require 'vendor/autoload.php';

    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $database = $mongoClient->selectDatabase("system");
    $collection = $database->selectCollection("products");

    $searchQuery = $_POST['search_query'];

    $products = $collection->find([
        '$or' => [
            ['product_name' => new MongoDB\BSON\Regex($searchQuery, 'i')],
            ['description' => new MongoDB\BSON\Regex($searchQuery, 'i')],
        ],
    ])->toArray();

    header('Content-Type: application/json');
    echo json_encode($products);
?>
