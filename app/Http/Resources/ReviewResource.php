<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' =>$this->id,
            'product_id' => $this->product_id,
            'product_name' =>$this->product->name,
            'customer' => $this->customer,
            'review' => $this->review,
            'star_rating' => $this->star,
            'included' => [
                'customer_info' => $this->customer,
            ],
            'href' => [
                'product_info' => route('products.show', $this->product)
            ]
        ];

    }
}
