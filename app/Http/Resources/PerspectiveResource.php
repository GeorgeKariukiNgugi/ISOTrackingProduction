<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerspectiveResource extends JsonResource
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
            'description' => $this->description,
            'weight' => $this->weight,
            'program_id' => $this->program_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'strategic_objectives' => new StrategicObjectiveCollection($this->whenLoaded('strategic_objectives')),
            'key_perfomace_indicators' => new KeyPerfomaceIndicatorCollection($this->whenLoaded('key_perfomace_indicators')),
            'strategic_objective_scores' => new StrategicObjectiveScoreCollection($this->whenLoaded('strategic_objective_scores')),
            'non_conformities' => new NonConformitiesCollection($this->whenLoaded('non_conformities')),
            'program' => new ProgramResource($this->whenLoaded('program'))
        ];
    }
}
