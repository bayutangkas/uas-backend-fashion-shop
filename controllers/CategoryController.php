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

    public function updateCategory()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_category'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_category'];
        $result = $this->categoryService->updateCategory($id, $data);
        echo json_encode(["message" => $result ? "Category updated successfully." : "Failed to update category."]);
        exit();
    }
}