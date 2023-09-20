<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Employee  ID' =>$this->id ,
            'User Name' =>$this->user->name ,
            'Job title' =>$this->Job_title,
            'Salary' =>$this->salary,
            'hire date' =>$this->hire_date,

        ];
    }
}
