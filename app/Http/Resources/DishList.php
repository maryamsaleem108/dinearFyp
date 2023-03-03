<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DishList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'dish_id' => $this->dish_id,
            'name' => $this->name,
            'calories' => $this->calories,
            'ingredients' => $this->ingredients,
            'image' => $this->image,
            'price' => $this->price
        ];

    }
}
