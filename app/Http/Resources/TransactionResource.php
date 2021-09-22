<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'number' => $this->number,
            'transaction_total' => $this->transaction_total,
            'transaction_status' => $this->transaction_status,
            'snaptoken' => $this->snaptoken,
            'province' => $this->province,
            'city' => $this->city,
            'courier' => $this->courier,
            'courier_price' => $this->courier_price,
            'category_name' => $this->category_name,
            'transaction_details' => TransactionDetailResource::collection($this->details)
        ];
    }
}
