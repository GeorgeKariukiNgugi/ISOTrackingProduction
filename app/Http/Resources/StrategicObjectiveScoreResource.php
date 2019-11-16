<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StrategicObjectiveScoreResource extends JsonResource
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
            'score' => $this->score,
            'year' => $this->year,
            'strategicObjective_id' => $this->strategicObjective_id,
            'perspective_id' => $this->perspective_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'perspective' => new PerspectiveResource($this->whenLoaded('perspective')),
            'strategic_objective_score' => new StrategicObjectiveScoreResource($this->whenLoaded('strategic_objective_score'))
        ];
    }
}
