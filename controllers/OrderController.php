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
}