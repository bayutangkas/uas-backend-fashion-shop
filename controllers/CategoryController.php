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

    public function readCategories()
    {
        $categories = $this->categoryService->fetchAllCategories();
        return json_encode($categories);
    }

    public function addCategory()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->categoryService->addCategory($data);
        return json_encode(["message" => $result ? "Category added successfully." : "Failed to add category."]);
    }
}