<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FetchResource extends JsonResource
{
    public function toArray($request): array
    {
        $emptyContent = $this->isEmptyContent();

        return [
            'code' => $emptyContent ? 204 : SUCCESS_CODE,
            'description' => $emptyContent ? NO_DATA_FOUND : FETCHED_SUCCESSFULLY,
            'data' => $this->collection ?? parent::toArray($request),
        ];
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse
    {
        return parent::toResponse($request)->setStatusCode(SUCCESS_CODE);
    }

    public function isEmptyContent(): bool
    {
        $emptyContent = true;
        if (! empty($this->resource && $this->resource->toArray())) {
            $emptyContent = false;
        }

        return $emptyContent;
    }
}
