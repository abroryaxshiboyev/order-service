<?php 

namespace App\Services;

use App\Jobs\ProcessOrder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService{

    public function createOrder(array $data){
        $order = Order::create([
            'customer_id' => $data['customer_id'],
            'delivery_date' => $data['delivery_date'],
        ]);

        $orderItems = [];
        foreach ($data['items'] as $item) {
            $orderItems[] = [
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ];
        }
        OrderItem::insert($orderItems);

        dispatch(new ProcessOrder($order));

        return $order;
    }
}