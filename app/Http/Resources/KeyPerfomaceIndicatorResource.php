<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeyPerfomaceIndicatorResource extends JsonResource
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
            'strategicObjective_id' => $this->strategicObjective_id,
            'perspective_id' => $this->perspective_id,
            'arithmeticStructure' => $this->arithmeticStructure,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'scores_recordeds' => new ScoresRecordedCollection($this->whenLoaded('scores_recordeds')),
            'key_perfomance_indicator_scores' => new KeyPerfomanceIndicatorScoreCollection($this->whenLoaded('key_perfomance_indicator_scores')),
            'non_conformities' => new NonConformitiesCollection($this->whenLoaded('non_conformities')),
            'perspective' => new PerspectiveResource($this->whenLoaded('perspective')),
            'strategic_objective' => new StrategicObjectiveResource($this->whenLoaded('strategic_objective'))
        ];
    }
}
