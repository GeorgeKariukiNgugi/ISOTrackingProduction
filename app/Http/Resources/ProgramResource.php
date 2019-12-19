<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'name' => $this->name,
            'shortHand' => $this->shortHand,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'perspectives' => new PerspectiveCollection($this->whenLoaded('perspectives')),
            'non_conformities' => new NonConformitiesCollection($this->whenLoaded('non_conformities'))
        ];
    }
}
