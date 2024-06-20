<?php
include_once 'models/OrderModel.php';

class OrderService
{
    private $orderModel;

    public function __construct(OrderModel $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function fetchAllOrders()
    {
        $orders = $this->orderModel->readAllOrders();
        $orders_array = array();
        $orders_array["records"] = array();
        while ($rows = $orders->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $order_item = array(
                "id_order" => $id_order,
                "id_product" => $id_product,
                "id_user" => $id_user,
                "order_date" => $order_date,
                "order_status" => $order_status,
                "product_quantity" => $product_quantity,
                "total_price" => $total_price,
                "payment" => $payment
            );
            array_push($orders_array["records"], $order_item);
        }
        
        return $orders_array;
    }

    public function addOrder($data)
    {
        return $this->orderModel->insertOrder($data);
    }

    public function updateOrder($id, $data)
    {
        return $this->orderModel->updateOrder($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->orderModel->deleteOrder($id);
    }
}
?>