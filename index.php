<?php
require_once 'vendor/autoload.php';
use Web\Product;
use Web\db;
use Web\ProductController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case "/":
        require_once "controllers/ProductController.php";
        $productController = new ProductController();
        $productController->listProduct();
        break;
    case 'add-product':
        require_once "controllers/ProductController.php";
        $productController = new ProductController();
        $productController->addProduct();
        break;
    case 'delete-product':
        require_once "controllers/ProductController.php";
        $productController = new ProductController();
        $productController->deleteProduct();
        break;
}
die();