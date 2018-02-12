<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UnitWithSubtopicResource;

class SubjectWithSubtopicResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "semester_number" => $this->semester_number,
            "units" => UnitWithSubtopicResource::collection($this->units),
        ];
    }
}
