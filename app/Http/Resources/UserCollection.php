<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
	public function toArray(Request $request): array
	{

	    return [
		    'id' => $this->id,
		    'first_name' => $this->first_name,
		    'last_name' => $this->last_name,
		    'age' => $this->age,
		    'gender' => $this->gender,
		    'email' => $this->email,
		    'facets' => $this->facet_id
	    ];

//        return parent::toArray($request);
    }
}
