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

    public function addProduct()
    {
        $data = json_decode(file_get_contents("php://input"), true);    
        $result = $this->productService->addProduct($data);
        return json_encode(["message" => $result ? "Product added successfully." : "Failed to add product."]);
    }

    public function updateProduct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_product'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_product'];
        $result = $this->productService->updateProduct($id, $data);
        echo json_encode(["message" => $result ? "Product updated successfully." : "Failed to update product."]);
        exit();
    }
}