<?php 

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class StatsService{
    public function getPopularProducts($limit=10,$time=3600){
        return Cache::remember('popular_products', $time, function () use($limit) {
            return Product::withCount('orderItems')
                ->orderBy('order_items_count', 'desc')
                ->limit($limit)
                ->get();
        });
    }
}