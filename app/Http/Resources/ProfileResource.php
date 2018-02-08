<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\User;
use App\Http\Resources\UniversityResource;
use App\Http\Resources\DegreeResource;
use App\Http\Resources\BranchResource;

class ProfileResource extends Resource
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
            'user' => $this->user,
            'university' => $this->university,
            'degree' => $this->degree,
            'branch' => $this->branch
        ];
    }
}
