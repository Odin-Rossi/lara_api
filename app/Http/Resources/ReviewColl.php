<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewColl extends JsonResource
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
            'customer' => $this->customer,
            'body' => $this->review,
            'star_rating' => $this->star,
            'href' => [
                'link' => route('reviews.show', [
                    'product' => $this->product->id,
                    'review' => $this->id]),
            ],
        ];
    }
}
