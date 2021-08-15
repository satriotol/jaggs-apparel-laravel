<?php

namespace App\Http\Resources;

use App\Models\ProductSize;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'weight' => $this->weight,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'product_size' => ProductSizeResource::collection($this->product_size),
            'galleries' => GalleryResource::collection($this->galleries)
        ];
    }
}
