<?php
include_once 'models/CategoryModel.php';

class CategoryService
{
    private $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function fetchAllCategories()
    {
        $categories = $this->categoryModel->readAllCategories();
        $categories_array = array();
        $categories_array["records"] = array();
        while ($row = $categories->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $category_item = array(
                "id_category" => $id_category,
                "category_name" => $category_name
            );
            array_push($categories_array["records"], $category_item);
        }
        
        return $categories_array;
    }

    public function addCategory($data)
    {
        return $this->categoryModel->insertCategory($data);
    }

    public function updateCategory($id, $data)
    {
        return $this->categoryModel->updateCategory($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryModel->deleteCategory($id);
    }
}
?>