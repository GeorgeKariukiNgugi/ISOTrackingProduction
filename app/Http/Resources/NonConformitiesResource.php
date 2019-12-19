<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NonConformitiesResource extends JsonResource
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
            'year' => $this->year,
            'quater' => $this->quater,
            'rootCause' => $this->rootCause,
            'openClosed' => $this->openClosed,
            'correction' => $this->correction,
            'correctiveAction' => $this->correctiveAction,
            'date' => $this->date,
            'keyPerfomanceIndicator_id' => $this->keyPerfomanceIndicator_id,
            'strategicObjective_id' => $this->strategicObjective_id,
            'perspective_id' => $this->perspective_id,
            'program_id' => $this->program_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'program' => new ProgramResource($this->whenLoaded('program')),
            'perspective' => new PerspectiveResource($this->whenLoaded('perspective')),
            'key_perfomace_indicator' => new KeyPerfomaceIndicatorResource($this->whenLoaded('key_perfomace_indicator')),
            'strategic_objective' => new StrategicObjectiveResource($this->whenLoaded('strategic_objective'))
        ];
    }
}
