<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FetchResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'code' => SUCCESS_CODE,
            'description' => empty($this->resource && $this->resource->toArray()) ? NO_DATA_FOUND : FETCHED_SUCCESSFULLY,
            'data' => $this->collection ?? parent::toArray($request),
        ];
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse
    {
        return parent::toResponse($request)->setStatusCode(SUCCESS_CODE);
    }
}
