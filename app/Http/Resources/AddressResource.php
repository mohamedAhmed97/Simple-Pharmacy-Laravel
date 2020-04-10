<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
                'area_id'=>$this->area_id,
                'street_name'=>$this->street_name,
                'building_number'=>$this->building_number,
                'floor_number'=>$this->floor_number,
                'flat_number'=>$this->flat_number,
                'is_main'=>$this->is_main,    
            ];
    }
}
