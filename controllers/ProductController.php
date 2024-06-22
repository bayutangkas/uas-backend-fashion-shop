<?php

include_once 'models/ProductModel.php';
include_once 'services/ProductService.php';

class ProductController
{
    private $productService;

    public function __construct($conn)
    {
        $productModel = new ProductModel($conn);
        $this->productService = new ProductService($productModel);
    }

    public function readProducts()
    {
        $products = $this->productService->fetchAllProducts();
        return json_encode($products);
    }
}