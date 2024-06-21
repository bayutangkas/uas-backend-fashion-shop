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
}