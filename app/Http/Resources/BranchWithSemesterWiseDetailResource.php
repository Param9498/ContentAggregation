<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchWithSemesterWiseDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $degree = $this->degree;
        $number_of_semster = $degree->number_of_semesters;
        $semesters = [];
        for ($i=1; $i <= $number_of_semster; $i++) {
            array_push($semesters, $i);
        }
        $details = [];
        foreach ($semesters as $semester) {
            $subjects = $this->subject()->where('semester_number', $semester)->get();
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'semster' =>[
                'semester_number'=>1
            ],
        ];
    }
}
