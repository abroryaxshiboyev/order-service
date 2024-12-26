<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessOrder implements ShouldQueue
{
    use Queueable;

    protected Order $order;
    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $totalPrice = 0;
        foreach ($this->order->items as $item) {
            $product = Product::findOrFail($item->product_id);

            $item->update([
                'price' => $product->price
            ]);
            $totalPrice += $product->price * $item->quantity;
        }

        $this->order->update([
            'total_price' => $totalPrice
        ]);
    }
}
