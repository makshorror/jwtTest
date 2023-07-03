<?php

namespace App\Http\Resources\Fruits;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FruitsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,

        ];
    }
}
