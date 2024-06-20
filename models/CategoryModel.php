<?php
class CategoryModel
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = 'category';
    }

    public function readAllCategories()
    {
        try
        {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertCategory($data)
    {
        try
        {
            $query = "INSERT INTO " . $this->table_name . " (category_name) VALUES (:category_name)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":category_name", $data['category_name']);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateCategory($id, $data)
    {
        try
        {
            $query = "UPDATE " . $this->table_name . " SET category_name = :category_name WHERE id_category = :id_category";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":category_name", $data['category_name']);
            $stmt->bindParam(":id_category", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteCategory($id)
    {
        try
        {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_category = :id_category";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_category", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>