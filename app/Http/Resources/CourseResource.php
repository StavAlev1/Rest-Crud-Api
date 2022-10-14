<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CourseResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'course';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->formatData();
    }

    public function formatData()
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'status' => $this->resource->status,
            'premium' => $this->resource->is_premium,
            'created_at' => Carbon::parse($this->resource->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->resource->updated_at)->toDateTimeString(),
            'deleted_at' => isset($this->resource->deleted_at) ? Carbon::parse($this->resource->deleted_at)->toDateTimeString() : null,
        ];
    }
}
