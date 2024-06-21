<?php
class OrderModel
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = 'orders';
    }

    public function readAllOrders()
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

    public function insertOrder($data)
    {
        try
        {
            $query = "INSERT INTO " . $this->table_name . " (id_product, id_user, order_date, order_status, product_quantity, total_price, payment) VALUES (:id_product, :id_user, :order_date, :order_status, :product_quantity, :total_price, :payment)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id_product", $data['id_product']);
            $stmt->bindParam(":id_user", $data['id_user']);
            $stmt->bindParam(":order_date", $data['order_date']);
            $stmt->bindParam(":order_status", $data['order_status']);
            $stmt->bindParam(":product_quantity", $data['product_quantity']);
            $stmt->bindParam(":total_price", $data['total_price']);
            $stmt->bindParam(":payment", $data['payment']);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateOrder($id, $data)
    {
        try
        {
            $query = "UPDATE " . $this->table_name . " SET id_product = :id_product, id_user = :id_user, order_date = :order_date, order_status = :order_status, product_quantity = :product_quantity, total_price = :total_price, payment = :payment WHERE id_order = :id_order";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id_product", $data['id_product']);
            $stmt->bindParam(":id_user", $data['id_user']);
            $stmt->bindParam(":order_date", $data['order_date']);
            $stmt->bindParam(":order_status", $data['order_status']);
            $stmt->bindParam(":product_quantity", $data['product_quantity']);
            $stmt->bindParam(":total_price", $data['total_price']);
            $stmt->bindParam(":payment", $data['payment']);
            $stmt->bindParam(":id_order", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteOrder($id)
    {
        try
        {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_order = :id_order";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_order", $id);

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