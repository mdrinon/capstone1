<?php
// Include the Composer autoloader
require 'vendor/autoload.php';

// Replace these values with your actual MongoDB connection details
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase("system");
$collection = $database->selectCollection("products");
?>