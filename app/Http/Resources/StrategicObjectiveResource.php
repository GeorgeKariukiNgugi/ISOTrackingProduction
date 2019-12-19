<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StrategicObjectiveResource extends JsonResource
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
            'perspective_id' => $this->perspective_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'key_perfomace_indicators' => new KeyPerfomaceIndicatorCollection($this->whenLoaded('key_perfomace_indicators')),
            'key_perfomance_indicator_scores' => new KeyPerfomanceIndicatorScoreCollection($this->whenLoaded('key_perfomance_indicator_scores')),
            'strategic_objective_scores' => new StrategicObjectiveScoreCollection($this->whenLoaded('strategic_objective_scores')),
            'non_conformities' => new NonConformitiesCollection($this->whenLoaded('non_conformities')),
            'perspective' => new PerspectiveResource($this->whenLoaded('perspective'))
        ];
    }
}
