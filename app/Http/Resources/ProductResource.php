<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock_qty' => $this->stock,
            'discount' => $this->discount,
            'discountedPrice' => ceil((1 - $this->discount / 100) * $this->price),
            'href' =>[
                'reviews' =>route('reviews.index', $this->id),
            ],
            'avg_rating' => $this->reviews()->sum('star')/ $this->reviews->count()
        ];

    }
}
