<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// class ProductCollection extends ResourceCollection
class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock_qty' => $this->stock,
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
