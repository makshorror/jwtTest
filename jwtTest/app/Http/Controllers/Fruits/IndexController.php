<?php

namespace App\Http\Controllers\Fruits;

use App\Http\Controllers\Controller;
use App\Http\Resources\Fruits\FruitsResource;
use App\Models\Fruit;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fruits = Fruit::all();
        return FruitsResource::collection($fruits);
    }
}
