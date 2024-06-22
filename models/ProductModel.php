<?php
class ProductModel
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = 'product';
    }

    public function readAllProducts()
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

    public function insertProduct($data)
    {
        try
        {
            $query = "INSERT INTO " . $this->table_name . " (id_category, product_name, photo, description, stock, price) VALUES (:id_category, :product_name, :photo, :description, :stock, :price)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id_category", $data['id_category']);
            $stmt->bindParam(":product_name", $data['product_name']);
            $stmt->bindParam(":photo", $data['photo']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":stock", $data['stock']);
            $stmt->bindParam(":price", $data['price']);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateProduct($id, $data)
    {
        try
        {
            $query = "UPDATE " . $this->table_name . " SET id_category = :id_category, product_name = :product_name, photo = :photo, description = :description, stock = :stock, price = :price WHERE id_product = :id_product";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id_category", $data['id_category']);
            $stmt->bindParam(":product_name", $data['product_name']);
            $stmt->bindParam(":photo", $data['photo']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":stock", $data['stock']);
            $stmt->bindParam(":price", $data['price']);
            $stmt->bindParam(":id_product", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}