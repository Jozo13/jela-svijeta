<?php

namespace App\Http\Resources;

use App\Models\Meal;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $meal = parent::toArray($request);

        $meal['status'] = Meal::CREATED;

        if ($meal['deleted_at']) {
            $meal['status'] = Meal::DELETED;
        } else if ($meal['created_at'] !== $meal['updated_at']) {
            $meal['status'] = Meal::MODIFIED;
        }

        return $meal;
    }
}
