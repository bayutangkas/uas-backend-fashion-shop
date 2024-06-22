<?php
include_once 'models/ProductModel.php';

class ProductService
{
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function fetchAllProducts()
    {
        $products = $this->productModel->readAllProducts();
        $products_array = array();
        $products_array["records"] = array();
        while ($rows = $products->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $product_item = array(
                "id_product" => $id_product,
                "id_category" => $id_category,
                "product_name" => $product_name,
                "photo" => $photo,
                "description" => $description,
                "stock" => $stock,
                "price" => $price
            );
            array_push($products_array["records"], $product_item);
        }
        
        return $products_array;
    }
}