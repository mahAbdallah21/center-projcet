<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Company id' =>$this->id ,
            'Name' =>$this->name ,
            'Owner' =>$this->owner ,
            'TAX Number' =>$this->tax_nubmer ,
            'Created at' =>date_format(date_create($this->created_at), 'Y-m-d h:i:s a'),
            'Branches' =>$this->branches,

        ];
    }
}
