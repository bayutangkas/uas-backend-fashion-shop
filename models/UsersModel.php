<?php
class UsersModel
{
    private $conn;
    private $table_name;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->table_name = 'user';  // Directly set the table name for 'user'
    }

    public function readAllUsers()
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
    
    public function insertUser($data)
    {
        try
        {
            $query = "INSERT INTO " . $this->table_name . " (user_name, email, password, role) VALUES (:user_name, :email, :password, :role)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $data['user_name']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":password", $data['password']);
            $stmt->bindParam(":role", $data['role']);

            return $stmt->execute();
        
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateUser($id, $data)
    {
        try
        {
            $query = "UPDATE " . $this->table_name . " SET user_name = :user_name, email = :email, password = :password, role = :role WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $data['user_name']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":password", $data['password']);
            $stmt->bindParam(":role", $data['role']);
            $stmt->bindParam(":id_user", $id);

            return $stmt->execute();
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteUser($id)
    {
        try
        {
            $query = "DELETE FROM " . $this->table_name . " WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_user", $id);

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
