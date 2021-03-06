<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'     =>  $this->getKey(),
            'name'   =>  $this->getAttribute('name'),
            'email'  =>  $this->getAttribute('name'),
        ];
    }
}
