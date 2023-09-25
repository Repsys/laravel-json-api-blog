<?php

namespace App\Http\Modules\Test\Resources;

use App\Http\Support\Resources\BaseJsonResource;

class TestResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return is_array($this->resource) ? $this->resource : [$this->resource];
    }
}
