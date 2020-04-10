<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [parent::toArray($request)];
        return [
            'user_id'=> $this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'date_of_birth'=>$this->date_of_birth,
            'national_id​'=>$this->national_id​,
            'avatar'=>$this->avatar,
            'mobile_number'=>$this->mobile_number,
            'address_info'=> new AddressResource($this),
        ];
    }
}
