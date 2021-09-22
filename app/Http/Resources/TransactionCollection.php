<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'meta' => [
                'count' => $this->collection->count(),
                'code' => 200,
                'status' => 'success',
            ],
            'data' => TransactionResource::collection($this->collection),
        ];
    }
}
