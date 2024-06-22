<?php
include_once 'models/CategoryModel.php';

class CategoryService
{
    private $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
}