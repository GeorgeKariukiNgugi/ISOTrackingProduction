<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KeyPerfomanceIndicatorScoreResource extends JsonResource
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
            'ytd' => $this->ytd,
            'keyPerfomanceIndicator_id' => $this->keyPerfomanceIndicator_id,
            'strategicObjective_id' => $this->strategicObjective_id,
            'score' => $this->score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
