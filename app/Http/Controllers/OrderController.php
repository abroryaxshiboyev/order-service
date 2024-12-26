<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $service
    ) {}
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $order=$this->service->createOrder($data);

        $response=new OrderResource($order);

        return $this->success($response,'order created successfully',201);
    }
}
