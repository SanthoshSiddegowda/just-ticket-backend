<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaveResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'code' => SUCCESS_CODE,
            'description' => empty($this->resource) ? SOMETHING_WENT_WRONG : SAVE_SUCCESSFUL,
            'data' => $this->collection ?? parent::toArray($request),
        ];
    }
}
