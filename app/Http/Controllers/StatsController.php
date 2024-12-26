<?php

namespace App\Http\Controllers;

use App\Http\Resources\PopularProductResource;
use App\Models\Product;
use App\Services\StatsService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Validation\ValidationException;

class StatsController extends Controller
{
    public function __construct(
        protected StatsService $service
    ) {}
    public function popularProducts()
    {
        try {
            $popularProducts = $this->service->getPopularProducts(10, 3600);

            $response = PopularProductResource::collection($popularProducts);
            return $this->success($response);
        } catch (Exceptions $th) {
            return "";
        }
    }
}
