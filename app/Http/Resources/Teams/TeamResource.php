<?php

namespace App\Http\Resources\Teams;

use Illuminate\Http\Resources\Json\Resource;

class TeamResource extends Resource
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
            'id'    =>  $this->getKey(),
            'name'  =>  $this->getAttribute('name'),
        ];
    }
}
