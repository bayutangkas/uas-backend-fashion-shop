<?php
include_once 'models/ProductModel.php';

class ProductService
{
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }
}