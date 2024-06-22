<?php

include_once 'models/OrderModel.php';
include_once 'services/OrderService.php';

class OrderController
{
    private $orderService;

    public function __construct($conn)
    {
        $orderModel = new OrderModel($conn);
        $this->orderService = new OrderService($orderModel);
    }

    public function readOrders()
    {
        $orders = $this->orderService->fetchAllOrders();
        return json_encode($orders);
    }

    public function addOrder()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->orderService->addOrder($data);
        return json_encode(["message" => $result ? "Order added successfully." : "Failed to add order."]);
    }

    public function updateOrder()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_order'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_order'];
        $result = $this->orderService->updateOrder($id, $data);
        echo json_encode(["message" => $result ? "Order updated successfully." : "Failed to update order."]);
        exit();
    }

    public function deleteOrder()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_order'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_order'];
        $result = $this->orderService->deleteOrder($id);
        echo json_encode(["message" => $result ? "Order deleted successfully." : "Failed to delete order."]);
        exit();
    }
}
?>
