<?php

include_once 'models/CategoryModel.php';
include_once 'services/CategoryService.php';

class CategoryController
{
    private $categoryService;

    public function __construct($conn)
    {
        $categoryModel = new CategoryModel($conn);
        $this->categoryService = new CategoryService($categoryModel);
    }
}